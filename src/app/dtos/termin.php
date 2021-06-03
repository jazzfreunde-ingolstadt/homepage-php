<?php

namespace Jazzfreunde\App\DTOs;

use Jazzfreunde\Structures\DateTimeSQL;

final class Termin extends \Jazzfreunde\Database\DTO
{
    public ?int $id;
    // public ?int $series_id,
    public string $titel;
    public ?string $subtitel;
    public string $start;
    public string $end;
    public string $ort;
    public ?string $link;
    // public ?string $thumbnail
}
