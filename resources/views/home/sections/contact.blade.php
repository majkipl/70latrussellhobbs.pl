<section class="home-contact" id="kontakt">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h2 class="text-uppercase color-blue-dark">Masz pytania? <br/><span class="text-lowercase">Napisz do nas!</span>
                </h2>
                <h3></h3>
            </div>
        </div>

        <div id="form">
            <form class="form row" method="post" action="{{ route('contact.send') }}">
                @csrf

                <div class="row fieldset">
                    <x-forms.input.text name="name" required="required" max="128" placeholder="Imię i Nazwisko" class="col-lg-10 offset-lg-1 col-xl-8 offset-xl-2"/>

                    <x-forms.input.email name="email" required="required" max="255" placeholder="Adres e-mail" class="col-lg-10 offset-lg-1 col-xl-8 offset-xl-2"/>

                    <x-forms.textarea name="message" required="required" max="4096" placeholder="Wiadomość" class="col-lg-10 offset-lg-1 col-xl-8 offset-xl-2"></x-forms.textarea>
                </div>

                <div class="row fieldset">
                    <x-forms.input.checkbox name="legal" required="required" class="col-12 col-lg-10 offset-lg-1 col-xl-8 offset-xl-2">
                        Wyrażam zgodę na przetwarzanie przekazanych
                        przeze mnie danych osobowych (imienia, nazwiska i adresu e-mail) w celu utrzymywania
                        kontaktu przez Spectrum Brands Poland sp. z o.o. z siedzibą w Warszawie, przy ul. Bitwy
                        Warszawskiej 1920 r. 7A, jako administratora przekazanych danych osobowych. Potwierdzam
                        jednocześnie, że zostałem poinformowany o dobrowolności wyrażenia zgody na przetwarzanie
                        danych osobowych, o prawie do wycofania zgody w dowolnym momencie oraz o zgodności z prawem
                        przetwarzania, którego dokonano na podstawie zgody przed jej wycofaniem. Więcej informacji o
                        przetwarzaniu danych osobowych pod linkiem <a
                            href="{{ asset('/uploads/polityka-prywatnosci.pdf') }}" target="_blank"
                            rel="noopener noreferrer">Polityka prywatności</a>.
                    </x-forms.input.checkbox>
                </div>

                <div class="row fieldset">
                    <div class="col-12 col-lg-10 offset-lg-1 col-xl-8 offset-xl-2 field text-center">
                        <button class="button button-small button-red send" title="Wyślij">Wyślij</button>
                    </div>
                </div>
            </form>
        </div>

    </div>
</section>
