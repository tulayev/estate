<!-- Newsletter -->
<form
    id="newsletterForm"
    class="uk-grid-collapse uk-flex uk-flex-wrap uk-flex-wrap-around uk-flex-middle uk-background-default uk-box-shadow-medium uk-width-1-1@m uk-width-3-4@l uk-margin-auto w-full rounded-lg uppercase"
    uk-grid
>
    <!-- Email Input -->
    <div class="uk-width-1-4@s border-r border-borderColor "> 
        <div class="form-input-anim">
            <input
                type="text"
                name="name"
                class="input w-full px-[30px] border-rounded focus:outline-none"
                autocomplete="off"
                required
            />
            <label for="name" class="label-name">
                <span class="content-name">
                    Enter Your Name
                </span>
            </label>
        </div>
    </div>

    <!-- Preferences Input -->
    <div class="uk-width-1-2@s form-drop-down px-4 text-center"> 
        <span class="text-lg font-bold text-[#c6c6c6]">
            What you'd like to receive
        </span>
        <div
            uk-dropdown="mode: hover; pos: bottom-justify;"
            class="uk-dropdown uk-overflow-hidden uk-padding-remove"
        >
            <ul
                class="uk-nav uk-dropdown-nav uk-scrollable max-h-[50vw] sm:max-h-[20vw] overflow-y-auto p-2 shadow-md"
            >
                <li class="uk-active"><a href="#">Active</a></li>
                <li><a href="#">Item 1</a></li>
                <li class="uk-nav-header">Header</li>
                <li><a href="#">Item 2</a></li>
                <li><a href="#">Item 3</a></li>
                <li><a href="#">Item 4</a></li>
                <li class="uk-nav-divider"></li>
                <li><a href="#">Item 5</a></li>
                <li><a href="#">Item 6</a></li>
                <li><a href="#">Item 7</a></li>
                <li><a href="#">Item 8</a></li>
            </ul>
        </div>
    </div>

    <!-- Submit Button -->
    <div class="uk-width-1-4@s"> 
        <button class="relative sm:left-3 top-3 sm:top-0 bg-primary text-white border-rounded w-full text-xl font-bold h-full uppercase p-7">
            Submit
        </button>
    </div>
</form>