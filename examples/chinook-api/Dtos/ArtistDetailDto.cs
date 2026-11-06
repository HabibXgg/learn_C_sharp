namespace ChinookPractice.Dtos;

public sealed record AlbumDto(int AlbumId, string Title);
public sealed record ArtistDetailDto(int ArtistId, string? Name, IReadOnlyList<AlbumDto> Albums);
