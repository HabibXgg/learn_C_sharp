using ChinookPractice.Models;
using MySqlConnector;

namespace ChinookPractice.Data;

public sealed class ArtistRepository(IConfiguration configuration)
{
    private MySqlConnection OpenConnection()
    {
        var connectionString = configuration.GetConnectionString("Chinook")
            ?? throw new InvalidOperationException("ConnectionStrings:Chinook belum diatur.");
        return new MySqlConnection(connectionString);
    }

    public async Task<List<Artist>> GetAllAsync(CancellationToken cancellationToken)
    {
        await using var connection = OpenConnection();
        await connection.OpenAsync(cancellationToken);
        await using var command = new MySqlCommand("SELECT ArtistId, Name FROM Artist ORDER BY Name LIMIT 50", connection);
        await using var reader = await command.ExecuteReaderAsync(cancellationToken);
        var artists = new List<Artist>();
        while (await reader.ReadAsync(cancellationToken))
            artists.Add(new Artist(reader.GetInt32(0), reader.IsDBNull(1) ? null : reader.GetString(1)));
        return artists;
    }

    public async Task<Artist?> GetByIdAsync(int id, CancellationToken cancellationToken)
    {
        await using var connection = OpenConnection();
        await connection.OpenAsync(cancellationToken);
        await using var command = new MySqlCommand("SELECT ArtistId, Name FROM Artist WHERE ArtistId = @id", connection);
        command.Parameters.AddWithValue("@id", id);
        await using var reader = await command.ExecuteReaderAsync(cancellationToken);
        return await reader.ReadAsync(cancellationToken)
            ? new Artist(reader.GetInt32(0), reader.IsDBNull(1) ? null : reader.GetString(1))
            : null;
    }

    public async Task<List<Album>> GetAlbumsAsync(int artistId, CancellationToken cancellationToken)
    {
        await using var connection = OpenConnection();
        await connection.OpenAsync(cancellationToken);
        await using var command = new MySqlCommand("SELECT AlbumId, Title, ArtistId FROM Album WHERE ArtistId = @id ORDER BY Title", connection);
        command.Parameters.AddWithValue("@id", artistId);
        await using var reader = await command.ExecuteReaderAsync(cancellationToken);
        var albums = new List<Album>();
        while (await reader.ReadAsync(cancellationToken))
            albums.Add(new Album(reader.GetInt32(0), reader.GetString(1), reader.GetInt32(2)));
        return albums;
    }
}
