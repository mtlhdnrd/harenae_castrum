# tables
## planet
- ID (auto increment) (PK)
- name (string)
- image (filepath)
- description (string)
- hostility (0-5 int) (default 1)
- landable (bool) (default false)
- price (int)
- infopanel (filepath)

## journey
- ID (PK)
- date_recorded (date)
- date_of_journey (date)
- price (int)
- number_of_passangers (int)
- from (planetID) (FK)
- to (planetID) (FK)
- customer (customerID) (FK)

## customer
- ID (string) (PK)
- name (string)
- species (string)
- birthplace (string)
- residency (string)
