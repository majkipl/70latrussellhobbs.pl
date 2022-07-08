<section class="home-contact" id="kontakt">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h2 class="text-uppercase color-blue-dark">Masz pytania? <br /><span class="text-lowercase">Napisz do nas!</span></h2>
                <h3></h3>
            </div>
        </div>

        <div id="form">
            <div class="row fieldset">
                <div class="col-12 col-lg-10 offset-lg-1 col-xl-8 offset-xl-2 field">
                    <input class="input" type="text" name="contact_name" id="contact_name" required="" maxlength="100" value="" />
                    <div class="placeholder">Imię i Nazwisko*</div>
                    <div class="error-post"></div>
                </div>

                <div class="col-12 col-lg-10 offset-lg-1 col-xl-8 offset-xl-2 field">
                    <input class="input" type="text" name="contact_email" id="contact_email" required="" maxlength="34" value="" />
                    <div class="placeholder">Adres email*</div>
                    <div class="error-post"></div>
                </div>

                <div class="col-12 col-lg-10 offset-lg-1 col-xl-8 offset-xl-2 field">
                    <textarea class="textarea" name="contact_message" id="contact_message" required=""></textarea>
                    <div class="placeholder">Wiadomość*</div>
                    <div class="error-post"></div>
                </div>
            </div>

            <div class="row fieldset">
                <div class="col-12 col-lg-10 offset-lg-1 col-xl-8 offset-xl-2 field">
                    <input class="input-checkbox" type="checkbox" name="contact_legal_1" id="contact_legal_1">
                    <label for="contact_legal_1" class="label-checkbox">*Wyrażam zgodę na przetwarzanie przekazanych przeze mnie danych osobowych (imienia, nazwiska i adresu e-mail) w celu utrzymywania kontaktu przez Spectrum Brands Poland sp. z o.o. z siedzibą w Warszawie, przy ul. Bitwy Warszawskiej 1920 r. 7A, jako administratora przekazanych danych osobowych. Potwierdzam jednocześnie, że zostałem poinformowany o dobrowolności wyrażenia zgody na przetwarzanie danych osobowych, o prawie do wycofania zgody w dowolnym momencie oraz o zgodności z prawem przetwarzania, którego dokonano na podstawie zgody przed jej wycofaniem. Więcej informacji o przetwarzaniu danych osobowych pod linkiem <a href="{$smarty.const.PRIVACY_PATH}?t={$smarty.now}" target="_blank" rel="noopener noreferrer">Polityka prywatności</a>.</label>
                    <div class="error-post"></div>
                </div>

                <div class="clearfix"></div>
            </div>

            <div class="row fieldset">
                <div class="col-12 col-lg-10 offset-lg-1 col-xl-8 offset-xl-2 field text-center">
                    <button class="button button-small button-red send" title="Wyślij">Wyślij</button>
                </div>
            </div>
        </div>

    </div>
</section>
