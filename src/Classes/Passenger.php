<?php

final class Passenger
{
    private readonly string $username;
    private readonly string $first_name;
    private readonly string $last_name;
    private readonly string $tel_number;

    // uses the database connection to get data
    public function __construct(array $post_values)
    {
        // here will go the values from the table, only the ones  I need will be used. (later optimized to get ONLY what we need)        
        try {
            $pdo = connectToDatabase();
            $result = select($pdo, "SELECT * FROM Passenger WHERE username = :username", [':username' => $post_values['username']]);
            echo var_dump($result);
            $this->username = $result['username'];
            $this->first_name = $result['first_name'];
            $this->last_name = $result['last_name'];
            $this->tel_number = $result['tel_number'];
                       
        } catch (RuntimeException $e) {
           echo sprintf('The problem is the database failed conenction');
        }
    }

    public function getName(): string
    {
        return $this->first_name;
    }

    public function getAll(): array
    {
        return [
            "username" => $this->username,
            "first name" => $this->first_name,
            "last_name" => $this->last_name,
            "telephone number" => $this->tel_number
        ];
    }
}
