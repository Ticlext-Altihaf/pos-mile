# Aplikasi Mile Pos

- PHP 8.2
- MySQL

## Installation

1. `composer install`
2. configure `.env`
3. `php artisan key:generate`
4. `php artisan migrate:refresh --seed`
5. `php artisan storage:link`

### Development

1. `php artisan db:seed --class=FakeSeeder`

### Admin

/admin

- email: admin@localhost
- password: admin

# ERD

```mermaid
erDiagram
    users {
        auto id PK
        string name
        string organization
        string email
        string password
        bool is_admin
    }
    payment {
        auto id PK
        auto user_id FK "Author"
        string code "unique, auto generated"
        string payment_method "Metode Pembayaran"
        ubigint amount
    }
    packages {
        auto id PK
        auto user_id FK "Author"
        auto payment_id FK
        string sender_name "nullable"
        string sender_address "nullable"
        string sender_phone "nullable"
        string sender_postal_code "nullable"
        string receiver_name
        string receiver_address
        string receiver_phone
        string receiver_province
        string receiver_city_or_regency "Kota/Kabupaten"
        string receiver_district "Kecamatan"
        string receiver_village_or_subdistrict "Desa/Kelurahan"
        string receiver_postal_code "Kode Pos"
        string service_level "Jenis Layanan"
        string package_type "Jenis Barang"
        string cod "Cash On Delivery"
        string reference_number "Nomor Referensi"
        string instructions "e.g Tidak boleh dibanting"
   
        string code "auto generated"
        string airway_bill "auto generated"
    }
    
    koli {
        auto id PK
        auto package_id FK
        uint weight "Berat (KG)"
        uint length "Panjang (CM)"
        uint width "Lebar (CM)"
        uint height "Tinggi (CM)"
        string description "e.g Pakaian;nullable"
        string surcharge "Asurans;nullable"
        ubigint goods_value "Nilai Barang;nullable"
        uint amount "Jumlah barang"
    }
    
    packages ||--o{ koli : "Package has many Koli"
    
    users ||--o| packages : "User has many Packages"
    payment ||--o| packages : "Payment has many Packages"
```


