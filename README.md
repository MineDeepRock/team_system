# TeamSystem

```php
$game = Game::asNew();
$redTeamId = TeamId::asNew();
$blueTeamId = TeamId::asNew();
$yellowTeamId = TeamId::asNew();
```
join
```php
TeamSystem::joinGame(string $name, TeamId $teamId, GameId $gameId);
```

quit
```php
TeamSystem::quitGame(string $name);
```

get
```php
TeamSystem::getPlayerData(string $name);
```

getAll
```php
TeamSystem::getAllPlayerData();
```

get
```php
TeamSystem::getTeamPlayerData(TeamId $teamId);
```

get
```php
TeamSystem::getParticipantData(GameId $gameId);
```
