<section class="form-app-form">
    <div class="container">

        <form class="form row" method="post" id="form">

            <div class="col-12 col-lg-5 offset-lg-1 field">
                <input class="input" type="text" name="firstname" id="firstname" maxlength="100"  value="">
                <div class="placeholder">Imię*</div>
                <div class="error-post"></div>
            </div>

            <div class="col-12 col-lg-5 field">
                <input class="input" type="text" name="lastname" id="lastname" maxlength="100"  value="">
                <div class="placeholder">Nazwisko*</div>
                <div class="error-post"></div>
            </div>

            <div class="col-12 col-lg-5 offset-lg-1 field">
                <input class="input" type="text" name="address" id="address" maxlength="256" value="">
                <div class="placeholder">Ulica*</div>
                <div class="error-post"></div>
            </div>

            <div class="col-12 col-lg-5 field">
                <input class="input" type="text" name="address_nb" id="address_nb" maxlength="256" value="">
                <div class="placeholder">Nr domu / mieszkania*</div>
                <div class="error-post"></div>
            </div>

            <div class="col-12 col-lg-5 offset-lg-1 field">
                <input class="input" type="text" name="zip" id="zip" maxlength="6" value="">
                <div class="placeholder">Kod pocztowy*</div>
                <div class="error-post"></div>
            </div>

            <div class="col-12 col-lg-5 field">
                <input class="input" type="text" name="city" id="city" maxlength="256" value="">
                <div class="placeholder">Miasto*</div>
                <div class="error-post"></div>
            </div>

            <div class="col-12 col-lg-5 offset-lg-1 field">
                <input class="input" type="email" name="email" id="email" maxlength="255" value="">
                <div class="placeholder">Adres e-mail*</div>
                <div class="error-post"></div>
            </div>

            <div class="col-12 col-lg-5 field">
                <input class="input" type="text" name="phone" id="phone" maxlength="32" value="">
                <div class="placeholder">Telefon*</div>
                <div class="error-post"></div>
            </div>

            <div class="col-12 col-lg-10 offset-lg-1 field">
                <select class="input select" name="shop" aria-label="Sklep">
                    {foreach from=$shop key=key item=item name=name}
                    {if $key}
                    <option value="{$key}" {if $key eq $form.shop}selected{/if}>{$item}</option>
                    {else}
                    <option value="" {if !$form.shop}selected{/if}></option>
                    {/if}
                    {/foreach}
                </select>
                <div class="placeholder">Sklep, w którym dokonano zakupu*</div>
                <div class="error-post"></div>
            </div>

            <div class="col-12 col-sm-6 col-lg-4 offset-lg-4 field">
                <div class="slim slim_img_receipt_1 {if $errors.post.img_receipt_1}invalid{/if}">
                    {if $form.img_receipt_1_temp}
                    <img src="{$form.img_receipt_1_temp}" alt="" />
                    {/if}

                    <input type="file" name="img_receipt_1" value="" />
                </div>

                <input type="hidden" name="slim_img_receipt_1" value="{$us->myHtmlSpecialChars($form.img_receipt_1)}" />

                <div class="error-post"></div>

                <a href="#" class="button button-blue full-width upload" title="wybierz plik">wybierz plik</a>
            </div>

            <div class="col-12 col-lg-8 offset-lg-2 field">
                <select class="input select" name="product_1" aria-label="Zakupiony produkt">
                    {foreach from=$product key=key item=item name=name}
                    {if $key}
                    <option value="{$key}" {if $key eq $form.product_1}selected{/if}>{$item}</option>
                    {else}
                    <option value="" {if !$form.product_1}selected{/if}></option>
                    {/if}
                    {/foreach}
                </select>
                <div class="placeholder">Zakupiony produkt 1*</div>
                <div class="error-post"></div>
            </div>

            <div class="col-12 col-sm-6 col-lg-4 offset-lg-4 field">
                <div class="slim slim_img_ean_1 {if $errors.post.img_ean_1}invalid{/if}">
                    {if $form.img_ean_1_temp}
                    <img src="{$form.img_ean_1_temp}" alt="" />
                    {/if}

                    <input type="file" name="img_ean_1" value="" />
                </div>

                <input type="hidden" name="slim_img_ean_1" value="{$us->myHtmlSpecialChars($form.img_ean_1)}" />

                <div class="error-post"></div>

                <a href="#" class="button button-blue full-width upload" title="wybierz plik">wybierz plik</a>
            </div>

            <div class="col-12 col-lg-6 offset-lg-3">
                <input class="input-checkbox product-2" type="checkbox" name="is_product_2" id="is_product_2" {if $smarty.post.is_product_2}checked{/if}>
                <label for="is_product_2" class="label-checkbox">chcę dodać drugi produkt</label>
                <div class="error-post"></div>
            </div>

            <div class="col-12 col-lg-8 offset-lg-2 field field-product-2 {if $smarty.post.is_product_2}is-show{/if}">
                <select class="input select" name="product_2" aria-label="Zakupiony produkt">
                    {foreach from=$product key=key item=item name=name}
                    {if $key}
                    <option value="{$key}" {if $key eq $form.product_2}selected{/if}>{$item}</option>
                    {else}
                    <option value="" {if !$form.product_2}selected{/if}></option>
                    {/if}
                    {/foreach}
                </select>
                <div class="placeholder">Zakupiony produkt 2*</div>
                <div class="error-post"></div>
            </div>

            <div class="col-12 col-sm-6 col-lg-4 offset-lg-4 field field-product-2 {if $smarty.post.is_product_2}is-show{/if}">
                <div class="slim slim_img_ean_2 {if $errors.post.img_ean_2}invalid{/if}">
                    {if $form.img_ean_2_temp}
                    <img src="{$form.img_ean_2_temp}" alt="" />
                    {/if}

                    <input type="file" name="img_ean_2" value="" />
                </div>

                <input type="hidden" name="slim_img_ean_2" value="{$us->myHtmlSpecialChars($form.img_ean_2)}" />

                <div class="error-post"></div>

                <a href="#" class="button button-blue full-width upload upload-last" title="wybierz plik">wybierz plik</a>
            </div>

            <div class="col-12 col-lg-10 offset-lg-1 field">
                <select class="input select" name="where" id="where" aria-label="Skąd wiesz o promocji?">
                    {foreach from=$where key=key item=item name=name}
                    {if $key}
                    <option value="{$key}" {if $key eq $form.where}selected{/if}>{$item}</option>
                    {else}
                    <option value="" {if !$form.where}selected{/if}></option>
                    {/if}
                    {/foreach}
                </select>
                <div class="placeholder">Skąd wiesz o promocji?*</div>
                <div class="error-post"></div>
            </div>

            <div class="col-12 col-lg-10 offset-lg-1 field {if $form.where neq 20}hidden{/if}">
                <input type="text" class="input" name="where_other" id="where_other" aria-label="Inne" value="{$form.where_other}" />
                <div class="placeholder">Inne*</div>
                <div class="error-post"></div>
            </div>

            <div class="col-12 col-lg-10 offset-lg-1 field">
                <select class="input select" name="type_shop" id="type_shop" aria-label="Rodzaj sklepu">
                    {foreach from=$typeShop key=key item=item name=name}
                    {if $key}
                    <option value="{$key}" {if $key eq $form.type_shop}selected{/if}>{$item}</option>
                    {else}
                    <option value="" {if !$form.where}selected{/if}></option>
                    {/if}
                    {/foreach}
                </select>
                <div class="placeholder">Rodzaj sklepu*</div>
                <div class="error-post"></div>
            </div>

            <div class="col-12 col-lg-10 offset-lg-1">
                <input class="input-checkbox" type="checkbox" name="legal_0" id="legal_0" {if $smarty.post.legal_0}checked{/if}>
                <label for="legal_0" class="label-checkbox">Zaznacz wszystkie zgody</label>
                <div class="error-post"></div>
            </div>

            <div class="col-12 col-lg-10 offset-lg-1">
                <input class="input-checkbox legal" type="checkbox" name="legal_1" id="legal_1" {if $smarty.post.legal_1}checked{/if}>
                <label for="legal_1" class="label-checkbox">*Zapoznałe(a)m się z regulaminem, dostępnym na stronie {$smarty.const.DOMAIN} i wyrażam zgodę na wszystkie jego postanowienia.</label>
                <div class="error-post"></div>
            </div>

            <div class="col-12 col-lg-10 offset-lg-1">
                <input class="input-checkbox legal" type="checkbox" name="legal_2" id="legal_2" {if $smarty.post.legal_2}checked{/if}>
                <label for="legal_2" class="label-checkbox">*Zapoznałe(a)m się z Polityką prywatności, dostępną na stronie {$smarty.const.DOMAIN} (zawierająca informację o przetwarzaniu danych osobowych).</label>
                <div class="error-post"></div>
            </div>

            <div class="col-12 col-lg-10 offset-lg-1">
                <input class="input-checkbox legal" type="checkbox" name="legal_3" id="legal_3" {if $smarty.post.legal_3}checked{/if}>
                <label for="legal_3" class="label-checkbox">Wyrażam zgodę na przesyłanie na mój adres e-mail przez Spectrum Brands Sp. z o. o. z siedzibą w Warszawie <strong>informacji handlowych</strong> o produktach marek Remington, Russell Hobbs oraz George Foreman. Oświadczam, że zostałam/em poinformowana/y, że zgoda może być w każdym czasie wycofana. Wycofanie zgody nie wpływa na zgodność z prawem przetwarzania przed wycofaniem zgody.</label>
                <div class="error-post"></div>
            </div>

            <div class="col-12 col-lg-10 offset-lg-1">
                <input class="input-checkbox legal" type="checkbox" name="legal_4" id="legal_4" {if $smarty.post.legal_4}checked{/if}>
                <label for="legal_4" class="label-checkbox">Wyrażam zgodę na przetwarzanie przez Spectrum Brands Sp. z o. o. z siedzibą w Warszawie moich danych osobowych do komunikacji elektronicznej (e-mail), w celu <strong>marketingu bezpośredniego</strong> dotyczącego produktów marek Remington, Russell Hobbs oraz George Foreman, przy użyciu telekomunikacyjnych urządzeń końcowych i automatycznych systemów wywołujących. Oświadczam, że zostałam/em poinformowana/y, że zgoda może być w każdym czasie wycofana. Wycofanie zgody nie wpływa na zgodność z prawem przetwarzania przed wycofaniem zgody.</label>
                <div class="error-post"></div>
            </div>

            <div class="col-12 col-lg-10 offset-lg-1 text-center">
                <button class="button button-red mx-auto submit" type="submit" value="WYŚLIJ">WYŚLIJ</button>
            </div>

        </form>

    </div>
</section>
