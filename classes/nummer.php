<?php
// Set strict types
declare(strict_types=1);

class nummer {

    private ?int $ID;
    private string $albumID;

    private string $titel;

    private string $duur;

    private string $URL;

    /**
     * @param int|null $ID
     * @param string $albumID
     * @param string $titel
     * @param string $duur
     * @param string $URL
     */
    public function __construct(?int $ID, string $albumID, string $titel, string $duur, string $URL)
    {
        $this->ID = $ID;
        $this->albumID = $albumID;
        $this->titel = $titel;
        $this->duur = $duur;
        $this->URL = $URL;
    }

    /**
     * @return int|null
     */
    public function getID(): ?int
    {
        return $this->ID;
    }

    /**
     * @param int|null $ID
     */
    public function setID(?int $ID): void
    {
        $this->ID = $ID;
    }

    /**
     * @return string
     */
    public function getAlbumID(): string
    {
        return $this->albumID;
    }

    /**
     * @param string $albumID
     */
    public function setAlbumID(string $albumID): void
    {
        $this->albumID = $albumID;
    }

    /**
     * @return string
     */
    public function getTitel(): string
    {
        return $this->titel;
    }

    /**
     * @param string $titel
     */
    public function setTitel(string $titel): void
    {
        $this->titel = $titel;
    }

    /**
     * @return string
     */
    public function getDuur(): string
    {
        return $this->duur;
    }

    /**
     * @param string $duur
     */
    public function setDuur(string $duur): void
    {
        $this->duur = $duur;
    }

    /**
     * @return string
     */
    public function getURL(): string
    {
        return $this->URL;
    }

    /**
     * @param string $URL
     */
    public function setURL(string $URL): void
    {
        $this->URL = $URL;
    }



    public static function getAll(PDO $db): array
    {
        // Voorbereiden van de query
        $stmt = $db->query("SELECT * FROM nummer");

        // Array om album op te slaan
        $nummers = [];

        // Itereren over de resultaten en personen toevoegen aan de array
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $nummer = new nummer(
                $row['ID'],
                $row['albumID'],
                $row['titel'],
                $row['duur'],
                $row['URL'],
            );
            $nummers[] = $nummer;
        }

        // Retourneer array met personen
        return $nummers;
    }

}
