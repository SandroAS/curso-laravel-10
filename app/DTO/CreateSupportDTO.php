<?php

namespace App\DTO;

use App\Http\Requests\SupportRequest;

class CretaeSupportDTO
{
  public function __construct(
    public string $subject,
    public string $status,
    public string $body,
  ) {}

  public static function makeFromRequest(SupportRequest $request): self
  {
    return new self(
      $request->subject,
      'a',
      $request->body
    );
  }
}