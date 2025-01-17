<section class="section">
    <div class="container">
        <h2 class="section-title mb-16">
            Subscribe to Our Newsletter
        </h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-0 rounded-xl border border-transparent bg-white uppercase">
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

            <div class="form-drop-down">
                <label for="name" class="label-name">
                    <span class="content-name">
                       Select topic
                    </span>
                </label>
                <div uk-dropdown="pos: bottom-left">
                    <ul class="uk-nav uk-dropdown-nav">
                        <li><a href="#">Research</a></li>
                        <li><a href="#">Luxury</a></li>
                        <li><a href="#">Summer</a></li>
                        <li><a href="#">Investment</a></li>
                    </ul>
                </div>
                
            </div>

            

            <div class="form-input-anim">
                <button class="bg-primary text-white border-rounded w-full text-xl font-bold h-full uppercase">
                    Submit
                </button>
            </div>
        </div>
    </div>
</section>
