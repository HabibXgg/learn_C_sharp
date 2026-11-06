using ChinookPractice.Services;
using Microsoft.AspNetCore.Mvc;

namespace ChinookPractice.Controllers;

[ApiController]
[Route("api/artists")]
public sealed class ArtistsController(ArtistService service) : ControllerBase
{
    [HttpGet]
    public async Task<IActionResult> GetAll(CancellationToken cancellationToken) =>
        Ok(await service.GetAllAsync(cancellationToken));

    [HttpGet("{id:int}")]
    public async Task<IActionResult> GetDetail(int id, CancellationToken cancellationToken)
    {
        var artist = await service.GetDetailAsync(id, cancellationToken);
        return artist is null ? NotFound(new { message = "Artist tidak ditemukan" }) : Ok(artist);
    }
}
