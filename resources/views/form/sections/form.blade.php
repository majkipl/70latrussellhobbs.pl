<section class="form-app-form" id="formApplication">
    <div class="container">

        <form class="form row" method="post" action="/dodaj-zgloszenie/zapisz">
            @csrf

            <x-forms.input.text name="firstname" required="required" max="128" placeholder="Imię" class="offset-lg-1"/>

            <x-forms.input.text name="lastname" required="required" max="128" placeholder="Nazwisko"/>

            <x-forms.input.text name="address" required="required" max="255" placeholder="Ulica" class="offset-lg-1"/>

            <x-forms.input.text name="address_nb" required="required" max="32" placeholder="Nr domu / mieszkania"/>

            <x-forms.input.text name="zip" required="required" max="6" placeholder="Kod pocztowy" class="offset-lg-1"/>

            <x-forms.input.text name="city" required="required" max="128" placeholder="Miasto"/>

            <x-forms.input.email name="email" required="required" max="255" placeholder="Adres e-mail"
                                 class="offset-lg-1"/>
            <x-forms.input.text name="phone" required="required" max="32" placeholder="Telefon"/>

            <x-forms.select name="shop" required="required" placeholder="Sklep, w którym dokonano zakupu"
                            class="col-lg-10 offset-lg-1" :items="$shops"/>

            <x-forms.input.file name="img_receipt" required="required" class="offset-lg-3">
                dodaj zdjęcie dowodu zakupu
            </x-forms.input.file>

            <x-forms.select name="product_1" required="required" placeholder="Zakupiony produkt"
                            class="col-lg-10 offset-lg-1" :items="$products"/>

            <x-forms.input.file name="img_ean_1" required="required" class="offset-lg-3">
                dodaj zdjęcie kodu EAN
            </x-forms.input.file>

            <x-forms.input.checkbox name="is_product_2">
                <span>chcę dodać drugi produkt</span>
            </x-forms.input.checkbox>

            <x-forms.select name="product_2" placeholder="Zakupiony produkt"
                            class="col-lg-10 offset-lg-1 field-product-2" :items="$products"/>

            <x-forms.input.file name="img_ean_2" class="offset-lg-3 field-product-2">
                dodaj zdjęcie kodu EAN
            </x-forms.input.file>

            <x-forms.select name="whence" required="required" placeholder="Skąd wiesz o promocji?"
                            class="col-lg-10 offset-lg-1" :items="$whences"/>

            <x-forms.input.text name="where_other" max="255" placeholder="Inne"
                                class="offset-lg-1 col-lg-10 hidden"/>

            <x-forms.select name="type_shop" required="required" placeholder="Rodzaj sklepu"
                            class="col-lg-10 offset-lg-1" :items="$types"/>

            <x-forms.input.checkbox name="legal_0">
                <span>Zaznacz wszystkie zgody</span>
            </x-forms.input.checkbox>

            <x-forms.input.checkbox name="legal_1" required="required" class="legal">
                <span>*Zapoznałe(a)m się z regulaminem, dostępnym na stronie {{ env('APP_DOMAIN') }} i wyrażam zgodę na wszystkie jego postanowienia.</span>
            </x-forms.input.checkbox>

            <x-forms.input.checkbox name="legal_2" required="required" class="legal">
                <span>*Zapoznałe(a)m się z Polityką prywatności, dostępną na stronie {{ env('APP_DOMAIN') }} (zawierająca informację o przetwarzaniu danych osobowych).</span>
            </x-forms.input.checkbox>

            <x-forms.input.checkbox name="legal_3" class="legal">
                <span>Wyrażam zgodę na przesyłanie na mój adres e-mail przez Spectrum Brands Sp. z o. o. z siedzibą w Warszawie <strong>informacji handlowych</strong> o produktach marek Remington, Russell Hobbs oraz George Foreman. Oświadczam, że zostałam/em poinformowana/y, że zgoda może być w każdym czasie wycofana. Wycofanie zgody nie wpływa na zgodność z prawem przetwarzania przed wycofaniem zgody.</span>
            </x-forms.input.checkbox>

            <x-forms.input.checkbox name="legal_4" class="legal">
                <span>Wyrażam zgodę na przetwarzanie przez Spectrum Brands Sp. z o. o. z siedzibą w Warszawie moich danych osobowych do komunikacji elektronicznej (e-mail), w celu <strong>marketingu bezpośredniego</strong> dotyczącego produktów marek Remington, Russell Hobbs oraz George Foreman, przy użyciu telekomunikacyjnych urządzeń końcowych i automatycznych systemów wywołujących. Oświadczam, że zostałam/em poinformowana/y, że zgoda może być w każdym czasie wycofana. Wycofanie zgody nie wpływa na zgodność z prawem przetwarzania przed wycofaniem zgody.</span>
            </x-forms.input.checkbox>

            <div class="col-12 col-lg-10 offset-lg-1 text-center">
                <button class="button button-red mx-auto submit" type="submit">WYŚLIJ</button>
            </div>

        </form>

    </div>
</section>
