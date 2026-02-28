<?php

declare(strict_types=1);

namespace App\DataObjects;

readonly class Basics
{
    /** @param array<SocialProfile> $profiles */
    public function __construct(
        public string $name = '',
        public string $label = '',
        public string $image = '',
        public string $email = '',
        public string $phone = '',
        public string $url = '',
        public string $summary = '',
        public Location $location = new Location(),
        public array $profiles = [],
    ) {
    }

    public static function fromArray(array $data): self
    {
        $location = new Location();
        if (isset($data['location'])) {
            $location = Location::fromArray($data['location']);
        }

        $profiles = [];
        if (isset($data['profiles'])) {
            $profiles = array_map(
                fn (array $profile) => SocialProfile::fromArray($profile),
                $data['profiles']
            );
        }

        return new self(
            name: $data['name'] ?? '',
            label: $data['label'] ?? '',
            image: $data['image'] ?? '',
            email: $data['email'] ?? '',
            phone: $data['phone'] ?? '',
            url: $data['url'] ?? '',
            summary: $data['summary'] ?? '',
            location: $location,
            profiles: $profiles,
        );
    }
}
