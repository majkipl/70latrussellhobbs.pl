<section class="home-steps" id="gratis">
    <div class="container">
        <div class="row">

            <div class="col-12 text-center">
                <h1 class="text-uppercase color-white">jak odebrać gratis?</h1>
            </div>

            <div class="col-12 col-sm-4 text-center step">
                <div class="icon">
                    <img src="{{ asset('images/svg/steps/s1.svg') }}" width="150" alt="s1" />
                </div>
                <p class="caption">Kup w dniach <strong>10.10.2022-15.01.2023</strong> <br />produkty Russell Hobbs <br />za <span class="color-skin">min. 299 zł</span> u jednego <br />z partnerów akcji.</p>
            </div>

            <div class="col-12 col-sm-4 text-center step">
                <div class="icon">
                    <img src="{{ asset('images/svg/steps/s2.svg') }}" width="150" alt="s2" />
                </div>
                <p class="caption mb-3">Zarejestruj kupione produkty <br />w ciągu 7 dni od zakupu <br />za pomocą <a href="/dodaj-zgloszenie/" title="Wypełnij formularz zgłoszeniowy" class="link">formularza <br />zgłoszeniowego</a>.</p>
                <p class="caption">Pamiętaj o wycięciu kodów kreskowych <br />z opakowań produktów!</p>
            </div>

            <div class="col-12 col-sm-4 text-center step">
                <div class="icon">
                    <img src="{{ asset('images/svg/steps/s3.svg') }}" width="150" alt="s4" />
                </div>
                <p class="caption mb-3"><strong>Gotowe!</strong> Zabieramy się <br />do sprawdzenia Twoje zgłoszenia.</p>
                <p>Jeśli wszystko jest w porządku, <br /><strong>gratis</strong> zostanie <strong>wysłany</strong> na <br />adres podany w formularzu <br />w ciągu 30 dni.</p>
            </div>

            <div class="col-12 col-sm-10 col-md-8 col-lg-6 col-xl-4 offset-sm-1 offset-md-2 offset-lg-3 offset-xl-4 d-flex flex-column align-items-center text-center">
                <a href="/dodaj-zgloszenie/" class="button button-red full-width" title="formularz zgłoszeniowy">formularz zgłoszeniowy</a>
                <a href="{$smarty.const.RULE_PATH}?t={$smarty.now}" class="button button-red full-width" title="sprawdź regulamin promocji">regulamin</a>
            </div>

        </div>
    </div>
</section>
