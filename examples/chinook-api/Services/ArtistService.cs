using ChinookPractice.Data;
using ChinookPractice.Dtos;
using ChinookPractice.Models;

namespace ChinookPractice.Services;

public sealed class ArtistService(ArtistRepository repository)
{
    public Task<List<Artist>> GetAllAsync(CancellationToken cancellationToken) =>
        repository.GetAllAsync(cancellationToken);

    public async Task<ArtistDetailDto?> GetDetailAsync(int id, CancellationToken cancellationToken)
    {
        if (id < 1) return null;
        var artist = await repository.GetByIdAsync(id, cancellationToken);
        if (artist is null) return null;
        var albums = await repository.GetAlbumsAsync(id, cancellationToken);
        return new ArtistDetailDto(artist.ArtistId, artist.Name,
            albums.Select(album => new AlbumDto(album.AlbumId, album.Title)).ToList());
    }
}
