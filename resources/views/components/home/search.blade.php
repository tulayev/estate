<!-- Search Section -->
<section class="search-section">
    <div class="search-header">
        <div class="search-container">
            <div class="search-input-wrapper">
                <li class="nav-link types">
                    <a class="text-gray-500 uppercase">Keywords </a>
                    <ul class="drop-down">
                        <li>Keyword 1</li>
                        <li>Keyword 2</li>
                        <li>Keyword 3</li>
                    </ul>
                </li>

                <li class="nav-link types">
                    <a class="text-gray-500 uppercase">Type </a>
                    <ul class="drop-down">
                        <li>Primary</li>
                        <li>Resale</li>
                        <li>Land</li>
                    </ul>
                </li>

                <div class="search-divider"></div>
                <li class="nav-link types">
                    <a class="text-gray-500 uppercase">Location </a>
                    <ul class="drop-down">
                        <li>Bang Tao</li>
                        <li>Bang Tao</li>
                        <li>Bang Tao</li>
                    </ul>
                </li>

                <div class="search-divider"></div>
                <li class="nav-link types">
                    <a class="text-gray-500 uppercase"
                    >🛏️

                        <span class="bed-counter-number" id="bedCounterSearchBar"
                        >1</span
                        >
                    </a>
                    <ul class="drop-down">
                        <li>
                            <div class="bed-counter-container">
                                <button class="bed-decrease" onclick="decreaseBeds()">
                                    -
                                </button>
                                <span class="bed-counter-number" id="bedCounterDropDown"
                                >From 1</span
                                >
                                <button class="bed-increase" onclick="increaseBeds()">
                                    +
                                </button>
                            </div>
                        </li>
                    </ul>
                </li>

                <div class="search-divider"></div>
                <li class="nav-link types price">
                    <div class="price-container">
                        <div class="price-inputs">
                            <div class="field">
                                <input
                                    type="number"
                                    class="input-min"
                                    value="0"
                                    placeholder="Min"
                                />
                            </div>
                            <div class="separator">-</div>
                            <div class="field">
                                <input
                                    type="number"
                                    class="input-max"
                                    value="10000000"
                                    placeholder="Max"
                                />
                            </div>
                        </div>
                    </div>

                    <ul class="drop-down">
                        <li>
                            <div class="price-range-container">
                                <div class="slider-container">
                                    <div class="price-slider">
                                        <div class="progress"></div>
                                    </div>
                                    <div class="range-input">
                                        <input
                                            type="range"
                                            class="range-min"
                                            min="0"
                                            max="10000000"
                                            value="0"
                                            step="1000"
                                        />
                                        <input
                                            type="range"
                                            class="range-max"
                                            min="0"
                                            max="10000000"
                                            value="10000000"
                                            step="1000"
                                        />
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </li>

                <div class="search-divider"></div>
                <button
                    class="search-section-btn"
                    onclick="toggleAdvancedSearch()"
                >
                    <span class="text-gray-500 uppercase">+</span>
                </button>
                <!-- Advanced Search Popup -->
                <div
                    id="advancedSearchPopup"
                    class="advanced-search-popup hidden"
                >
                    <div class="popup-content">
                        <div class="popup-header uppercase">
                            <h3>Filters</h3>

                            <button onclick="toggleAdvancedSearch()" class="close-btn">
                                &times;
                            </button>
                        </div>
                        <div class="popup-body">
                            <!--Type filter group-->
                            <div class="popup-filters-container">
                                <div class="popup-filter-type uppercase">tags |</div>
                                <button class="chosen-option-btn uppercase">
                                    X Chosen Option
                                </button>
                            </div>
                            <div class="filter-group">
                                <div class="checkbox-group">
                                    <div class="filter-selection-container">
                                        <div
                                            class="filter-name uppercase"
                                            style="background-color: #0f1f3d"
                                        >
                                            primary
                                        </div>
                                        <div
                                            class="filter-name uppercase"
                                            style="background-color: #69a8a4"
                                        >
                                            resale
                                        </div>
                                        <div
                                            class="filter-name uppercase"
                                            style="background-color: #5a6bc9"
                                        >
                                            land
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--Keywords and Price range-->
                            <div class="left-right-container">
                                <div class="left-container">
                                    <div class="popup-filters-container">
                                        <div class="popup-filter-type uppercase">
                                            Keywords
                                        </div>
                                    </div>
                                    <div class="keywords-input-container">
                                        <input
                                            type="text"
                                            class="keywords-input uppercase"
                                            style="width: 70%"
                                            placeholder="for example: beautiful view villa"
                                        />
                                        <button
                                            class="keyword-luna-ai-btn uppercase"
                                            style="
                              width: 70%;
                              color: white;
                              font-weight: 900;
                              font-size: 1rem;
                              background-color: #662884;
                              border-radius: 10px;
                              margin: 1rem auto;
                            "
                                        >
                                            analyze wih ai
                                        </button>
                                    </div>
                                </div>
                                <div class="right-container">
                                    <div class="popup-filters-container">
                                        <div class="popup-filter-type uppercase">
                                            Price range
                                        </div>
                                    </div>
                                    <div class="from-to-price-container">
                                        <div class="from-price-container">
                                            <input
                                                type="number"
                                                class="from-price-input"
                                                placeholder="From"
                                            />
                                            <span class="thin-underline"> </span>
                                        </div>
                                        <div class="to-price-container">
                                            <input
                                                type="number"
                                                class="to-price-input"
                                                placeholder="To"
                                            />
                                            <span class="thin-underline"> </span>
                                        </div>
                                    </div>
                                    <div class="price-slider-container">
                                        <div class="price-slider">
                                            <div class="progress-popup"></div>
                                        </div>
                                        <div class="range-input-popup">
                                            <input
                                                type="range"
                                                class="range-min-popup"
                                                min="0"
                                                max="10000000"
                                                value="0"
                                                step="1000"
                                            />
                                            <input
                                                type="range"
                                                class="range-max-popup"
                                                min="0"
                                                max="10000000"
                                                value="10000000"
                                                step="1000"
                                            />
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--Location -->
                            <div class="popup-filters-container">
                                <div class="popup-filter-type uppercase">location |</div>
                                <button class="chosen-option-btn uppercase">
                                    X Chosen Option
                                </button>
                            </div>
                            <div id="map-filter"></div>

                            <!--Facilities filter group-->
                            <div class="popup-filters-container">
                                <div class="popup-filter-type uppercase">
                                    facilities |
                                </div>
                                <button class="chosen-option-btn uppercase">
                                    X Chosen Option
                                </button>
                            </div>
                            <div class="left-right-container">
                                <div class="left-container">
                                    <div class="popup-filters-container">
                                        <div
                                            class="popup-filter-type uppercase"
                                            style="color: #c6c6c6"
                                        >
                                            Bathrooms
                                        </div>
                                    </div>
                                    <div class="bathrooms-slider-container">
                                        <div class="bathroom-emoji">🛁</div>
                                        <div class="bathroom-slider">
                                            <div
                                                class="bathroom-progress"
                                                style="background-color: #0f1f3d; margin: 0.5rem"
                                            ></div>
                                            <div
                                                class="range-values"
                                                style="
                                display: flex;
                                justify-content: space-between;
                                margin: 0 2rem;
                              "
                                            >
                                                <span>0</span>
                                                <span id="bathroom-value">0</span>
                                            </div>
                                            <input
                                                type="range"
                                                class="bathroom-range"
                                                min="0"
                                                max="7"
                                                value="0"
                                                step="1"
                                                oninput="document.getElementById('bathroom-value').textContent = this.value"
                                            />
                                        </div>
                                    </div>
                                </div>
                                <div class="right-container">
                                    <div class="popup-filters-container">
                                        <div
                                            class="popup-filter-type uppercase"
                                            style="color: #c6c6c6"
                                        >
                                            Bedrooms
                                        </div>
                                    </div>
                                    <div class="bedroom-slider-container">
                                        <div class="bedroom-emoji">🛏️</div>
                                        <div class="bedroom-slider">
                                            <div
                                                class="bedroom-progress"
                                                style="background-color: #0f1f3d; margin: 0.5rem"
                                            ></div>
                                            <div
                                                class="range-values"
                                                style="
                                display: flex;
                                justify-content: space-between;
                                margin: 0 2rem;
                              "
                                            >
                                                <span>0</span>
                                                <span id="bedroom-value">0</span>
                                            </div>
                                            <input
                                                type="range"
                                                class="bedroom-range"
                                                min="0"
                                                max="7"
                                                value="0"
                                                step="1"
                                                oninput="document.getElementById('bedroom-value').textContent = this.value"
                                            />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="other-facilities-container">
                                <div class="grid grid-cols-4 grid-rows-1 gap-2">
                                    <div class="other-facility-item">
                                        <div class="other-facility-emoji">🏋️‍♂️</div>
                                        <div class="other-facility-name">
                            <span class="other-facility-name-text uppercase">
                              Gym
                            </span>
                                        </div>
                                    </div>

                                    <div class="other-facility-item">
                                        <div class="other-facility-emoji">🏊</div>
                                        <div class="other-facility-name">
                            <span class="other-facility-name-text uppercase">
                              pool
                            </span>
                                        </div>
                                    </div>

                                    <div class="other-facility-item">
                                        <div class="other-facility-emoji">🏖</div>
                                        <div class="other-facility-name">
                            <span class="other-facility-name-text uppercase">
                              Beach
                            </span>
                                        </div>
                                    </div>

                                    <div class="other-facility-item">
                                        <div class="other-facility-emoji">👨‍🍳</div>
                                        <div class="other-facility-name">
                            <span class="other-facility-name-text uppercase">
                              Chef
                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--Tags filter group-->
                            <div class="popup-filters-container">
                                <div class="popup-filter-type uppercase">tags |</div>
                                <button class="chosen-option-btn uppercase">
                                    X Chosen Option
                                </button>
                            </div>
                            <div class="filter-group">
                                <div class="checkbox-group">
                                    <div class="filter-selection-container">
                                        <div
                                            class="filter-name uppercase"
                                            style="background-color: #0f1f3d"
                                        >
                                            Research
                                        </div>
                                        <div
                                            class="filter-name uppercase"
                                            style="background-color: #69a8a4"
                                        >
                                            Luxury
                                        </div>
                                        <div
                                            class="filter-name uppercase"
                                            style="background-color: #5a6bc9"
                                        >
                                            Summer
                                        </div>
                                        <div
                                            class="filter-name uppercase"
                                            style="background-color: #5a6bc9"
                                        >
                                            Condo
                                        </div>
                                        <div
                                            class="filter-name uppercase"
                                            style="background-color: #5a6bc9"
                                        >
                                            Smth
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--Popup footer group-->
                        <div class="popup-footer">
                            <button class="apply-btn uppercase">
                                show 124 results
                            </button>
                        </div>
                    </div>
                </div>

                <button class="circle-button search-btn">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </div>
    </div>
</section>
