namespace ChinookPractice.Models;

public sealed record Artist(int ArtistId, string? Name);
public sealed record Album(int AlbumId, string Title, int ArtistId);
