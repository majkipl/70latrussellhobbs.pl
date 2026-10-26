# 70 lat Russell Hobbs — Platforma Promocyjna

[![Laravel 9](https://img.shields.io/badge/Laravel-9.x-red.svg?logo=laravel)](https://laravel.com/)
[![PHP 8.1](https://img.shields.io/badge/PHP-8.1-blue.svg?logo=php)](https://www.php.net/)
[![MySQL 8.0](https://img.shields.io/badge/MySQL-8.0-orange.svg?logo=mysql)](https://www.mysql.com/)
[![Redis](https://img.shields.io/badge/Redis-7.0-critical.svg?logo=redis)](https://redis.io/)
[![Vite](https://img.shields.io/badge/Vite-4.0-purple.svg?logo=vite)](https://vitejs.dev/)
[![Bootstrap 5](https://img.shields.io/badge/Bootstrap-5.2-blueviolet.svg?logo=bootstrap)](https://getbootstrap.com/)
[![Docker Compose](https://img.shields.io/badge/Docker-Ready-2496ED.svg?logo=docker)](https://www.docker.com/)

Aplikacja internetowa dedykowana akcji jubileuszowej **70 lat marki Russell Hobbs** (`70latrussellhobbs.pl`). Serwis obsługuje stronę promocyjną (landing page), formularz zgłoszeniowy dla uczestników akcji (rejestracja zakupu produktów, załączanie dowodów zakupu i kodów EAN), katalog produktów wg kolekcji oraz panel administracyjny z autoryzacją ról do zarządzania zgłoszeniami i asortymentem.

---

## Spis treści

- [O projekcie](#o-projekcie)
- [Główne funkcjonalności](#główne-funkcjonalności)
- [Stack technologiczny](#stack-technologiczny)
- [Infrastruktura Docker](#infrastruktura-docker)
- [Wymagania wstępne](#wymagania-wstępne)
- [Uruchomienie projektu](#uruchomienie-projektu)
  - [Wariant 1: Uruchomienie z Docker (Zalecane)](#wariant-1-uruchomienie-z-docker-zalecane)
  - [Wariant 2: Uruchomienie lokalne (bez Dockera)](#wariant-2-uruchomienie-lokalne-bez-dockera)
- [Konfiguracja środowiska (.env)](#konfiguracja-środowiska-env)
- [Domyślne konta i uprawnienia](#domyślne-konta-i-uprawnienia)
- [Struktura projektu](#struktura-projektu)
- [Routing i API](#routing-i-api)
- [Optymalizacja i Caching (Redis)](#optymalizacja-i-caching-redis)
- [Przydatne polecenia](#przydatne-polecenia)

---

## O projekcie

Serwis został stworzony na potrzeby ogólnopolskiej kampanii konsumenckiej marki Russell Hobbs. Głównym celem systemu jest automatyzacja przyjmowania zgłoszeń promocyjnych, weryfikacja dowodów zakupu (paragonów i kodów kreskowych wyciętych z opakowań), bezpośredni kontakt z klientami oraz bezpieczne zarządzanie zebranymi danymi w dedykowanym panelu administracyjnym.

---

## Główne funkcjonalności

### Część publiczna (Frontend)
- **Strona główna (Landing Page):**
  - Informacje o jubileuszu 70-lecia i zasadach promocji.
  - Sekcja kroków („Jak wziąć udział”).
  - Prezentacja nagród i gratisów.
  - Kategorie produktowe z odnośnikami do szczegółów.
  - Sekcja FAQ (Najczęściej zadawane pytania).
  - Formularz kontaktowy z powiadomieniami e-mail (`ContactService`).
  - Podpięte dokumenty prawne (Regulamin promocji oraz Polityka prywatności w PDF).
- **Formularz zgłoszeniowy (`/dodaj-zgloszenie`):**
  - Zbieranie danych uczestnika (dane osobowe, adres korespondencyjny, telefon, e-mail).
  - Wybór sklepu partnerskiego (lista zdefiniowanych sieci stacjonarnych i internetowych) oraz typu sklepu.
  - Rejestracja kupionego produktu (produkt główny oraz opcjonalny drugi produkt promocyjny).
  - Bezpieczny upload plików graficznych: zdjęcie/skan dowodu zakupu oraz zdjęcia kodów kreskowych EAN wyciętych z opakowań.
  - Obsługa wymaganych i opcjonalnych zgód formalno-prawnych (regulamin, RODO).
  - Po pomyślnej rejestracji: transakcyjny zapis w bazie danych (`DB::transaction`), generowanie unikalnego ID zgłoszenia i wysyłka wiadomości z potwierdzeniem (`ApplicationMail`).
  - Dedykowana strona z podziękowaniem (`/dodaj-zgloszenie/dziekujemy/{id}`).
- **Katalog produktów wg kolekcji (`/{slug}`):**
  - Dynamiczne strony kolekcji (np. *Nowości*, *Produkty śniadaniowe*, *Produkty do gotowania*, *Prasowanie*).
  - Prezentacja produktów z bezpośrednimi linkami zakupu w sklepach partnerskich (`ProductUrl`).

### Panel administracyjny (`/panel`)
- **Autoryzacja i uprawnienia:** Zabezpieczony mechanizmem `can:isAdmin` bazującym na rolach użytkowników (`UserRole::ADMIN`).
- **Obsługa zgłoszeń (`/panel/zgloszenia`):**
  - Tabela oparta o Bootstrap Table integrująca się z backendowym API (`/api/applications`).
  - Szybkie wyszukiwanie pełnotekstowe po wielu polach (dane klienta, sklep, produkty, źródło).
  - Stronicowanie, sortowanie i filtry.
  - Podgląd szczegółów pojedynczego zgłoszenia (`/panel/zgloszenie/{id}`) wraz z miniaturami i podglądem wgranych paragonów oraz kodów EAN.
- **Zarządzanie kolekcjami (`/panel/kolekcja`):**
  - Przegląd, dodawanie, edycja i usuwanie kolekcji produktów.
- **Zarządzanie produktami (`/panel/produkt`):**
  - Baza produktów, przypisywanie kodów i powiązań z kolekcjami.

---

## Stack technologiczny

| Warstwa | Technologia |
|---|---|
| **Język backendu** | PHP 8.1 |
| **Framework** | Laravel 9.19+ |
| **Baza danych** | MySQL 8.0.33 |
| **Pamięć podręczna** | Redis 7.0 (via `predis/predis`) |
| **Frontend & Asset Bundler** | Vite 4.0 + `laravel-vite-plugin` |
| **UI & Style** | Bootstrap 5.2.3, Sass / SCSS, Bootstrap Table |
| **JavaScript** | ES6+, Axios, jQuery 3.7, Modernizr |
| **Konteneryzacja** | Docker & Docker Compose v3.9 |
| **Serwer WWW** | Apache 2.4 (mod_rewrite w kontenerze `php:8.1-apache`) |
| **Serwer poczty dev** | Mailcatcher (SMTP + Web GUI) |

---

## Infrastruktura Docker

Projekt posiada gotowe środowisko oparte na Docker Compose składające się z 6 usług:

| Usługa | Kontener | Obraz bazowy | Port zewn. (.env) | Port wewn. | Opis |
|---|---|---|---|---|---|
| **httpd** | `${APP_NAME}-httpd` | `Dockerfile_Httpd` (`php:8.1-apache`) | `8100`, `8106` | `80`, `8106` | Aplikacja Laravel + serwer deweloperski Vite |
| **db_mysql** | `${APP_NAME}-mysql` | `mysql:8.0.33` | `8101` | `3306` | Relacyjna baza danych MySQL |
| **phpmyadmin** | `${APP_NAME}-phpmyadmin` | `phpmyadmin:5.2` | `8102` | `80` | Webowy klient bazy danych |
| **redis** | `${APP_NAME}-redis` | `redis:7.0.11-alpine` | `8104` | `6379` | Serwer Redis dla sesji i pamięci podręcznej |
| **redisinsight**| `${APP_NAME}-redisinsight` | `redislabs/redisinsight:1.14.0` | `8105` | `8001` | Graficzny interfejs do analizy pamięci Redis |
| **mailcatcher** | `${APP_NAME}-mailcatcher`| `schickling/mailcatcher` | `8107`, `8108` | `1025`, `1080` | Serwer SMTP i skrzynka podglądu maili testowych |

> [!NOTE]
> W kontenerze `httpd` skrypt startowy [`docker/php/entrypoint.sh`](docker/php/entrypoint.sh) automatycznie dba o:
> 1. Uprawnienia katalogów `storage` i `public`.
> 2. Instalację zależności Composer (`composer install`).
> 3. Instalację i budowę assetów Node.js (`npm install && npm run build`).
> 4. Generowanie klucza aplikacji (`php artisan key:generate`).
> 5. Uruchomienie migracji i seedów (`php artisan migrate:fresh --seed`).
> 6. Wyczyszczenie cache'u i utworzenie symlinku dla dysku `public/storage`.

---

## Wymagania wstępne

### Dla środowiska Docker:
- [Docker](https://docs.docker.com/get-docker/) (wersja >= 20.10)
- [Docker Compose](https://docs.docker.com/compose/) (wersja >= 2.0 / v3.9 specyfikacji)

### Dla środowiska tradycyjnego (bez Dockera):
- PHP >= 8.1 z rozszerzeniami: `pdo`, `pdo_mysql`, `bcmath`, `curl`, `mbstring`, `xml`
- [Composer](https://getcomposer.org/) 2.x
- [Node.js](https://nodejs.org/) (wersja 18.x lub 20.x) oraz npm
- Serwer MySQL 8.x
- Serwer Redis 6.x lub 7.x

---

## Uruchomienie projektu

### Wariant 1: Uruchomienie z Docker (Zalecane)

1. **Sklonuj repozytorium:**
   ```bash
   git clone <adres-repozytorium> 70latrussellhobbs
   cd 70latrussellhobbs
   ```

2. **Przygotuj plik środowiskowy `.env`:**
   Skopiuj wzorcowy plik lub uzupełnij `.env` o zmienne portów Dockera:
   ```bash
   cp .env.example .env
   ```
   Upewnij się, że w `.env` skonfigurowane są zmienne kontenerów (np. porty `8100-8108` oraz hosty bazy/redisa – patrz sekcja [Konfiguracja środowiska](#konfiguracja-środowiska-env)).

3. **Zbuduj i uruchom kontenery:**
   ```bash
   docker compose up -d --build
   ```

4. **Śledzenie procesu inicjalizacji:**
   Pierwsze uruchomienie pobierze obrazy, zainstaluje pakiety Composera i Node'a oraz przygotuje bazę danych:
   ```bash
   docker compose logs -f httpd
   ```

5. **Dostęp do usług po uruchomieniu:**
   - **Aplikacja WWW:** [http://localhost:8100](http://localhost:8100)
   - **Panel administracyjny:** [http://localhost:8100/panel](http://localhost:8100/panel)
   - **phpMyAdmin:** [http://localhost:8102](http://localhost:8102)
   - **Mailcatcher (Podgląd e-maili):** [http://localhost:8108](http://localhost:8108)
   - **RedisInsight:** [http://localhost:8105](http://localhost:8105)

---

### Wariant 2: Uruchomienie lokalne (bez Dockera)

1. **Instalacja zależności PHP:**
   ```bash
   composer install
   ```

2. **Konfiguracja środowiska:**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```
   W pliku `.env` wskaż lokalną bazę danych MySQL i lokalny Redis (`DB_HOST=127.0.0.1`, `REDIS_HOST=127.0.0.1`).

3. **Dowiązanie zasobów publicznych:**
   ```bash
   php artisan storage:link
   ```

4. **Migracje i zasilenie danymi testowymi:**
   ```bash
   php artisan migrate:fresh --seed
   ```

5. **Instalacja zależności frontendowych i budowa:**
   ```bash
   npm install
   npm run build
   # lub w trybie developerskim z hot-reloadem:
   npm run dev
   ```

6. **Uruchomienie serwera aplikacji:**
   ```bash
   php artisan serve
   ```
   Aplikacja będzie dostępna pod adresem: [http://localhost:8000](http://localhost:8000).

---

## Konfiguracja środowiska (.env)

Kluczowe zmienne konfiguracyjne wykorzystywane w aplikacji:

```dotenv
APP_NAME=70LatRussellHobbs
APP_ENV=local
APP_KEY=base64:...
APP_DEBUG=true
APP_URL=http://localhost:8100
APP_CONTACT_MAIL="kontakt@twojadomena.pl" # Adres odbiorcy formularza kontaktowego

# --- Porty i integracja Docker ---
DOCKER_DOMAIN=${APP_NAME}
DOCKER_AUTHOR=twoj_login
DOCKER_HTTPD_PORT=8100
DOCKER_MYSQL_PORT=8101
DOCKER_PHPMYADMIN_PORT=8102
DOCKER_REDIS_PORT=8104
DOCKER_REDISINSIGHT_PORT=8105
DOCKER_VITE_PORT=8106
DOCKER_MAILCATCHER_SMTP=8107
DOCKER_MAILCATCHER_WEB=8108

# --- Baza danych ---
DB_CONNECTION=mysql
DB_HOST=70LatRussellHobbs-mysql # lub 127.0.0.1 dla środowiska lokalnego
DB_PORT=3306
DB_DATABASE=rh_70lat
DB_USERNAME=rh_70lat
DB_PASSWORD=rh_70lat
DB_ROOTPASSWORD=root_pass

# --- Redis & Cache ---
CACHE_DRIVER=redis
REDIS_HOST=70LatRussellHobbs-redis # lub 127.0.0.1 dla środowiska lokalnego
REDIS_PASSWORD=null
REDIS_PORT=6379

# --- Przechowywanie plików ---
FILESYSTEM_DISK=public

# --- Poczta (Mailcatcher) ---
MAIL_MAILER=smtp
MAIL_HOST=70LatRussellHobbs-mailcatcher # lub 127.0.0.1 dla środowiska lokalnego
MAIL_PORT=1025
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS="no-reply@70latrussellhobbs.pl"
MAIL_FROM_NAME="${APP_NAME}"
```

---

## Domyślne konta i uprawnienia

Po wykonaniu seedera bazy danych (`UserSeeder`), w systemie tworzone jest domyślne konto administratora:

- **E-mail:** `admin@example.com`
- **Hasło:** `asd123`
- **Rola:** `admin` (`UserRole::ADMIN`)
- **Dostęp do panelu:** `/panel`, `/panel/zgloszenia`, `/panel/kolekcja`, `/panel/produkt`

> [!WARNING]
> Pamiętaj, aby przed wdrożeniem na środowisko produkcyjne zmienić dane logowania domyślnego administratora oraz wygenerować unikalny klucz `APP_KEY`.

---

## Struktura projektu

Najważniejsze elementy architektury katalogów:

```
├── app/
│   ├── Enums/                 # Klasy wyliczeniowe (np. UserRole)
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── Api/           # Kontrolery REST API (Application, Collection, Product)
│   │   │   ├── Auth/          # Logowanie, rejestracja, reset hasła (Laravel UI)
│   │   │   ├── Panel/         # Kontrolery panelu admina (Application, Collection, Product)
│   │   │   ├── ApplicationController.php  # Obsługa publicznego formularza zgłoszeń
│   │   │   ├── CollectionController.php   # Wyświetlanie kolekcji produktów
│   │   │   ├── ContactController.php      # Obsługa formularza kontaktowego
│   │   │   └── HomeController.php         # Strona główna
│   │   ├── Middleware/        # Pośrednicy (autoryzacja, CSRF dla AJAX, JSON auth)
│   │   └── Requests/          # Klasy walidacji FormRequest
│   ├── Mail/                  # Klasy wiadomości e-mail (ApplicationMail, ContactMail)
│   ├── Models/                # Modele Eloquent (Application, Product, Collection, Shop itp.)
│   ├── Policies/              # Uprawnienia i polityki autoryzacyjne
│   └── Services/              # Warstwa logiki biznesowej (ApplicationService, ContactService)
├── database/
│   ├── factories/             # Fabryki danych testowych
│   ├── migrations/            # Migracje schematu bazy danych
│   └── seeders/               # Seedery słowników (sklepy, produkty, kolekcje, admin)
├── docker/
│   └── php/                   # Konfiguracja vhosta Apache (000-default.conf), php.ini i entrypoint.sh
├── public/                    # Publiczny katalog serwera WWW, assety i symlink do storage
├── resources/
│   ├── js/                    # Skrypty JS (dla landing page oraz panelu admina)
│   ├── sass/                  # Style SCSS (aplikacja publiczna + widoki panelu)
│   └── views/
│       ├── emails/            # Szablony powiadomień e-mail
│       ├── form/              # Szablony formularza zgłoszeniowego
│       ├── home/              # Sekcje strony głównej (top, steps, gratis, categories, faq, contact)
│       ├── layouts/           # Główne layouty Blade (rh.blade.php, panel.blade.php)
│       ├── panel/             # Widoki panelu administracyjnego
│       └── product/           # Prezentacja produktów w kolekcjach
├── routes/
│   ├── web.php                # Trasy widoków i akcji publicznych / panelu
│   └── api.php                # Trasy endpointów REST API
├── Dockerfile_Httpd           # Definicja kontenera PHP 8.1 + Apache + Node.js
├── docker-compose.yaml        # Definicja wielokontenerowego środowiska deweloperskiego
└── vite.config.js             # Konfiguracja bundlera Vite
```

---

## Routing i API

### Trasy publiczne (`routes/web.php`)

| Metoda | Ścieżka | Nazwa trasy | Opis |
|---|---|---|---|
| `GET` | `/` | `home` | Strona główna kampanii |
| `GET` | `/kontakt` | `home.contact` | Sekcja kontaktowa |
| `GET` | `/poznaj-nasze-produkty` | `home.products` | Sekcja produktów |
| `POST` | `/kontakt/wyslij` | `contact.send` | Wysłanie zapytania z formularza kontaktowego |
| `GET` | `/dodaj-zgloszenie` | `form` | Widok formularza rejestracji zakupu |
| `POST` | `/dodaj-zgloszenie/zapisz`| `form.save` | Zapis zgłoszenia i upload plików |
| `GET` | `/dodaj-zgloszenie/dziekujemy/{id}` | `thx.app` | Strona podziękowania po poprawnym zgłoszeniu |
| `GET` | `/{slug}` | `products.collection` | Widok wybranej kolekcji produktów |

### Panel Administracyjny (`/panel`)

| Metoda | Ścieżka | Nazwa trasy | Opis |
|---|---|---|---|
| `GET` | `/panel` | `panel` | Dashboard administracyjny |
| `GET` | `/panel/zgloszenia` | `panel.apps` | Lista zgłoszeń promocyjnych |
| `GET` | `/panel/zgloszenie/{id}` | `panel.app.show` | Szczegóły zgłoszenia (dane i załączniki) |
| `GET` | `/panel/kolekcja` | `panel.collection` | Zarządzanie kolekcjami |
| `GET` | `/panel/produkt` | `panel.product` | Zarządzanie produktami |

### Endpointy REST API (`routes/api.php`)

| Metoda | Endpoint | Opis | Wymagane uprawnienia |
|---|---|---|---|
| `GET` | `/api/product/url/{id}` | Pobranie adresów URL zakupu produktu | Publiczne |
| `GET` | `/api/applications` | Lista zgłoszeń dla tabeli (paginacja, filtry, sortowanie) | Zalogowany użytkownik |
| `GET` | `/api/collection` | Pobranie listy kolekcji | Zalogowany użytkownik |
| `POST` | `/api/collection` | Dodanie nowej kolekcji | Zalogowany użytkownik |
| `PUT` | `/api/collection` | Aktualizacja danych kolekcji | Zalogowany użytkownik |
| `DELETE`| `/api/collection/{id}` | Usunięcie kolekcji | Zalogowany użytkownik |
| `GET` | `/api/product` | Pobranie listy produktów | Zalogowany użytkownik |
| `POST` | `/api/product` | Dodanie nowego produktu | Zalogowany użytkownik |
| `PUT` | `/api/product` | Aktualizacja danych produktu | Zalogowany użytkownik |
| `DELETE`| `/api/product/{id}` | Usunięcie produktu | Zalogowany użytkownik |

---

## Optymalizacja i Caching (Redis)

Aby zapewnić maksymalną wydajność i zminimalizować narzut na bazę danych MySQL pod dużym ruchem, słowniki oraz kolekcje są buforowane w Redis:

- `Shop::getAllCached()` – buforowanie listy sklepów (klucz: `shops`).
- `TypeShop::getAllCached()` – buforowanie typów sklepów (klucz: `type_shops`).
- `Whence::getAllCached()` – buforowanie źródeł wiedzy o promocji (klucz: `whences`).
- `Product::getAllCached()` – buforowanie sformatowanej listy produktów z kodami (klucz: `products`).
- `Product::getByCollection($slug)` – buforowanie produktów przypisanych do danej kategorii.
- `CollectionController::show($slug)` – buforowanie obiektów kolekcji.

Wszystkie klucze posiadają domyślny czas wygaśnięcia do 365 dni lub są inwalidowane przy zmianach w panelu administracyjnym. Stan bazy Redis można na bieżąco monitorować przez narzędzie **RedisInsight** pod adresem: `http://localhost:8105`.

---

## Przydatne polecenia

### Wykonywanie poleceń w kontenerze Docker
```bash
# Wykonanie komendy artisan wewnątrz kontenera:
docker compose exec httpd php artisan <polecenie>

# Wejście do powłoki bash kontenera aplikacji:
docker compose exec httpd bash

# Podgląd logów aplikacji w czasie rzeczywistym:
docker compose logs -f httpd
```

### Operacje na bazie danych i pamięci podręcznej
```bash
# Czyszczenie pamięci podręcznej aplikacji i konfiguracji:
docker compose exec httpd php artisan cache:clear
docker compose exec httpd php artisan config:clear
docker compose exec httpd php artisan route:clear
docker compose exec httpd php artisan view:clear

# Ponowne zresetowanie bazy danych i wykonanie seederów:
docker compose exec httpd php artisan migrate:fresh --seed
```

### Budowanie zasobów frontendowych
```bash
# Budowa assetów produkcyjnych (JS / CSS):
npm run build

# Uruchomienie trybu watch / serwera Vite podczas developmentu:
npm run dev
```

### Uruchamianie testów jednostkowych i funkcjonalnych
```bash
# Uruchomienie testów PHPUnit:
docker compose exec httpd php artisan test
# lub bezpośrednio przez phpunit:
docker compose exec httpd ./vendor/bin/phpunit
```

---

## Licencja

Projekt stworzony na potrzeby kampanii promocyjnej Russell Hobbs. Wszelkie prawa zastrzeżone.
Bazowy framework Laravel objęty jest licencją [MIT](https://opensource.org/licenses/MIT).
