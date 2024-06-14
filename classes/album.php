<?php
// Set strict types
declare(strict_types=1);

class album {

    private ?int $ID;
    private string $Naam;

    private string $Artiesten;

    private string $Release_datum;

    private string $URL;

    private string $afbeelding;

    private string $Prijs;/**
 * @param int|null $ID
 * @param string $Naam
 * @param string $Artiesten
 * @param string $Release_datum
 * @param string $URL
 * @param string $afbeelding
 * @param string $Prijs
 */public function __construct(?int $ID, string $Naam, string $Artiesten, string $Release_datum, string $URL, string $afbeelding, string $Prijs)
{
    $this->ID = $ID;
    $this->Naam = $Naam;
    $this->Artiesten = $Artiesten;
    $this->Release_datum = $Release_datum;
    $this->URL = $URL;
    $this->afbeelding = $afbeelding;
    $this->Prijs = $Prijs;
}/**
 * @return int|null
 */
public function getID(): ?int
{
    return $this->ID;
}/**
 * @param int|null $ID
 */
public function setID(?int $ID): void
{
    $this->ID = $ID;
}/**
 * @return string
 */
public function getNaam(): string
{
    return $this->Naam;
}/**
 * @param string $Naam
 */
public function setNaam(string $Naam): void
{
    $this->Naam = $Naam;
}/**
 * @return string
 */
public function getArtiesten(): string
{
    return $this->Artiesten;
}/**
 * @param string $Artiesten
 */
public function setArtiesten(string $Artiesten): void
{
    $this->Artiesten = $Artiesten;
}/**
 * @return string
 */
public function getReleaseDatum(): string
{
    return $this->Release_datum;
}/**
 * @param string $Release_datum
 */
public function setReleaseDatum(string $Release_datum): void
{
    $this->Release_datum = $Release_datum;
}/**
 * @return string
 */
public function getURL(): string
{
    return $this->URL;
}/**
 * @param string $URL
 */
public function setURL(string $URL): void
{
    $this->URL = $URL;
}/**
 * @return string
 */
public function getAfbeelding(): string
{
    return $this->afbeelding;
}/**
 * @param string $afbeelding
 */
public function setAfbeelding(string $afbeelding): void
{
    $this->afbeelding = $afbeelding;
}/**
 * @return string
 */
public function getPrijs(): string
{
    return $this->Prijs;
}/**
 * @param string $Prijs
 */
public function setPrijs(string $Prijs): void
{
    $this->Prijs = $Prijs;
}



    /**
     * Haalt alle personen op uit de database.
     *
     * @param PDO $db De PDO-databaseverbinding.
     * @return album[] Een array van Persoon-objecten.
     */
    public static function getAll(PDO $db): array
    {
        // Voorbereiden van de query
        $stmt = $db->query("SELECT * FROM album");

        // Array om album op te slaan
        $albums = [];

        // Itereren over de resultaten en personen toevoegen aan de array
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $album = new album(
                $row['ID'],
                $row['Naam'],
                $row['Artiesten'],
                $row['Release_datum'],
                $row['URL'],
                $row['Afbeelding'],
                $row['Prijs']
            );
            $albums[] = $album;
        }

        // Retourneer array met personen
        return $album;
    }

}
