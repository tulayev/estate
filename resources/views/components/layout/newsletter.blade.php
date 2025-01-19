<!-- Newsletter -->
<form
    id="newsletterForm"
    class="uk-grid-collapse uk-flex uk-flex-wrap uk-flex-wrap-around uk-flex-middle uk-background-default uk-box-shadow-medium uk-width-1-1@m uk-width-3-4@l uk-margin-auto w-full rounded-lg uppercase"
    uk-grid
>
    <!-- Email Input -->
    <div class="uk-width-1-3@s">
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
    <div class="uk-width-1-3@s form-drop-down ml-7 sm:ml-0">
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
    <div class="uk-width-1-3@s">
        <button class="bg-primary text-white border-rounded w-full text-xl font-bold h-full uppercase p-4">
            Submit
        </button>
    </div>
</form>