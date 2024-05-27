<?php
require_once 'Person.php';
require_once 'interface.php';
interface ITeamLeader {
    public function addProject( object $project ): void;

    public function getProjects(): array;

    public function setDeveloper( object $developer, string $prjId ): void;

    public function changeProjectStatus( bool $status, string $prjId ): void;
}

interface IProject {
    public function addDeveloper(object $developer ): void;
    public function getDevelopers(): array;
    public function setProgress( int $progress ): void;
    public function getProgress(): int;
    public function setStatus( bool $status): void;
    public function getStatus(): bool;
    public function getId(): string;
    public function getName(): string;
}