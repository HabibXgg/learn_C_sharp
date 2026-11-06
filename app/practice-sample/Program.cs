using ChinookPractice.Data;
using ChinookPractice.Services;

var builder = WebApplication.CreateBuilder(args);
builder.Services.AddControllers();
builder.Services.AddScoped<ArtistRepository>();
builder.Services.AddScoped<ArtistService>();
var app = builder.Build();
app.MapControllers();
app.Run();
