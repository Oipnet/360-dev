<?php
namespace App\Service;

use RestCord\DiscordClient;

class DiscordService
{

    /**
     * @var DiscordClient
     */
    private $discordClient;

    /**
     * DiscordService constructor
     *
     * @param DiscordClient $discordClient
     */
    public function __construct(DiscordClient $discordClient)
    {
        $this->discordClient = $discordClient;
    }

    /**
     * @param int $memberId
     * @return array
     */
    public function getMemberRoles(int $memberId): array
    {
        $guildRoles  = $this->discordClient->guild->getGuild(['guild.id' => $this->getPrincipalGuildId()])->roles;
        $memberRoles = $this->discordClient->guild->getGuildMember([
            'guild.id' => $this->getPrincipalGuildId(),
            'user.id'  => $memberId
        ])->roles;
        $roles = [];
        foreach ($guildRoles as $role) {
            if (in_array($role->id, $memberRoles)) {
                $roles[] = $role->name;
            }
        }
        return $roles;
    }

    /**
     * @param int $memberId
     * @return \RestCord\Model\User\User
     */
    public function getUser(int $memberId)
    {
        return $this->discordClient->user->getUser(['user.id' => $memberId]);
    }

    /**
     * @return int
     */
    public function getPrincipalGuildId(): int
    {
        return (int) config('discord.guild_id');
    }

}