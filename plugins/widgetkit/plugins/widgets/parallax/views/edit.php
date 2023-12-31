<div class="uk-grid uk-grid-divider uk-form-horizontal" uk-grid>
    <div class="uk-width-1-4@m">

        <div>
            <ul class="uk-nav uk-nav-default" uk-switcher="#nav-content">
                <li><a href="">Parallax</a></li>
                <li><a href="">{{'Media' | trans}}</a></li>
                <li><a href="">{{'Content' | trans}}</a></li>
                <li><a href="">{{'General' | trans}}</a></li>
            </ul>
        </div>

    </div>
    <div class="uk-width-3-4@m">

        <ul id="nav-content" class="uk-switcher">
            <li>

                <h3 class="uk-heading-divider">{{'Background' | trans}}</h3>

                <div class="uk-margin">
                    <span class="uk-form-label">{{'Fullscreen' | trans}}</span>
                    <div class="uk-form-controls uk-form-controls-text">
                        <label><input class="uk-checkbox" type="checkbox" ng-model="widget.data['fullscreen']"> {{'Extend to full viewport height' | trans}}</label>
                    </div>
                </div>

                <div class="uk-margin">
                    <label class="uk-form-label" for="wk-min-height">{{'Min. Height (px)' | trans}}</label>
                    <div class="uk-form-controls">
                        <input id="wk-min-height" class="uk-input uk-form-width-medium" type="text" ng-model="widget.data['min_height']">
                    </div>
                </div>

                <div class="uk-margin">
                    <label class="uk-form-label" for="wk-background-translatey">{{'Vertical (px)' | trans}}</label>
                    <div class="uk-form-controls">
                        <input id="wk-background-translatey" class="uk-input uk-form-width-medium" type="text" ng-model="widget.data['background_translatey']">
                    </div>
                </div>

                <div class="uk-margin">
                    <label class="uk-form-label" for="wk-background-color">{{'Background Color' | trans}}</label>
                    <div class="uk-form-controls">
                        <input id="wk-background-color" class="uk-input uk-form-width-xsmall" type="text" ng-model="widget.data['background_color_start']"> to
                        <input class="uk-input uk-form-width-xsmall" type="text" ng-model="widget.data['background_color_end']"> ({{'e.g. %example%' | trans: {example:'#ff0000'} }})
                    </div>
                </div>

                <div class="uk-margin">
                    <span class="uk-form-label">{{'Color' | trans}}</span>
                    <div class="uk-form-controls uk-form-controls-text">
                        <label><input class="uk-checkbox" type="checkbox" ng-model="widget.data['contrast']"> {{'Use a high-contrast color.' | trans}}</label>
                    </div>
                </div>

                <div class="uk-margin">
                    <span class="uk-form-label">{{'Min. Width (px)' | trans}}</span>
                    <div class="uk-form-controls">
                        <label><input id="wk-media_query" class="uk-input uk-form-width-medium" type="text" ng-model="widget.data['media_query']" placeholder="e.g. 1024"> {{'Enable parallax effect only on devices with larger screens then the min. width' | trans}}</label>
                    </div>
                </div>

                <h3 class="uk-heading-divider">{{'Title' | trans}}</h3>

                <div class="uk-margin">
                    <label class="uk-form-label" for="wk-title-opacity">{{'Opacity' | trans}}</label>
                    <div class="uk-form-controls">
                        <input id="wk-title-opacity" class="uk-input uk-form-width-xsmall" type="text" ng-model="widget.data['title_opacity_start']" placeholder="1"> to
                        <input class="uk-input uk-form-width-xsmall" type="text" ng-model="widget.data['title_opacity_end']"> ({{'%from% to %to%' | trans: {from:'0.0', to:'1.0'} }})
                    </div>
                </div>

                <div class="uk-margin">
                    <label class="uk-form-label" for="wk-title-translatex">{{'Horizontal (px)' | trans}}</label>
                    <div class="uk-form-controls">
                        <input id="wk-title-translatex" class="uk-input uk-form-width-xsmall" type="text" ng-model="widget.data['title_translatex_start']" placeholder="0"> to
                        <input class="uk-input uk-form-width-xsmall" type="text" ng-model="widget.data['title_translatex_end']">
                    </div>
                </div>

                <div class="uk-margin">
                    <label class="uk-form-label" for="wk-title-translatey">{{'Vertical (px)' | trans}}</label>
                    <div class="uk-form-controls">
                        <input id="wk-title-translatey" class="uk-input uk-form-width-xsmall" type="text" ng-model="widget.data['title_translatey_start']" placeholder="0"> to
                        <input class="uk-input uk-form-width-xsmall" type="text" ng-model="widget.data['title_translatey_end']">
                    </div>
                </div>

                <div class="uk-margin">
                    <label class="uk-form-label" for="wk-title-scale">{{'Scale' | trans}}</label>
                    <div class="uk-form-controls">
                        <input id="wk-title-scale" class="uk-input uk-form-width-xsmall" type="text" ng-model="widget.data['title_scale_start']" placeholder="1"> to
                        <input class="uk-input uk-form-width-xsmall" type="text" ng-model="widget.data['title_scale_end']">
                    </div>
                </div>

                <h3 class="uk-heading-divider">{{'Content' | trans}}</h3>

                <div class="uk-margin">
                    <label class="uk-form-label" for="wk-content-opacity">{{'Opacity' | trans}}</label>
                    <div class="uk-form-controls">
                        <input id="wk-content-opacity" class="uk-input uk-form-width-xsmall" type="text" ng-model="widget.data['content_opacity_start']" placeholder="1"> to
                        <input class="uk-input uk-form-width-xsmall" type="text" ng-model="widget.data['content_opacity_end']"> ({{'%from% to %to%' | trans: {from:'0.0', to:'1.0'} }})
                    </div>
                </div>

                <div class="uk-margin">
                    <label class="uk-form-label" for="wk-content-translatex">{{'Horizontal (px)' | trans}}</label>
                    <div class="uk-form-controls">
                        <input id="wk-content-translatex" class="uk-input uk-form-width-xsmall" type="text" ng-model="widget.data['content_translatex_start']" placeholder="0"> to
                        <input class="uk-input uk-form-width-xsmall" type="text" ng-model="widget.data['content_translatex_end']">
                    </div>
                </div>

                <div class="uk-margin">
                    <label class="uk-form-label" for="wk-content-translatey">{{'Vertical (px)' | trans}}</label>
                    <div class="uk-form-controls">
                        <input id="wk-content-translatey" class="uk-input uk-form-width-xsmall" type="text" ng-model="widget.data['content_translatey_start']" placeholder="0"> to
                        <input class="uk-input uk-form-width-xsmall" type="text" ng-model="widget.data['content_translatey_end']">
                    </div>
                </div>

                <div class="uk-margin">
                    <label class="uk-form-label" for="wk-content-scale">{{'Scale' | trans}}</label>
                    <div class="uk-form-controls">
                        <input id="wk-content-scale" class="uk-input uk-form-width-xsmall" type="text" ng-model="widget.data['content_scale_start']" placeholder="1"> to
                        <input class="uk-input uk-form-width-xsmall" type="text" ng-model="widget.data['content_scale_end']">
                    </div>
                </div>

                <h3 class="uk-heading-divider">{{'Advanced' | trans}} ({{'Only Content and Text' | trans}})</h3>

                <div class="uk-margin">
                    <label class="uk-form-label" for="wk-viewport">{{'Viewport' | trans}}</label>
                    <div class="uk-form-controls">
                        <input id="wk-viewport" class="uk-input uk-form-width-xsmall" type="text" ng-model="widget.data['viewport']" placeholder="1"> {{'Animation end point, relative to viewport height' | trans}}
                    </div>
                </div>

                <div class="uk-margin">
                    <label class="uk-form-label" for="wk-easing">{{'Easing' | trans}}</label>
                    <div class="uk-form-controls">
                        <input id="wk-easing" class="uk-input uk-form-width-xsmall" type="text" ng-model="widget.data['velocity']" placeholder="0.5"> {{'Easing of the animation' | trans}}
                    </div>
                </div>

                <div class="uk-margin">
                    <span class="uk-form-label">{{'Target' | trans}}</span>
                    <div class="uk-form-controls uk-form-controls-text">
                        <label><input class="uk-checkbox" type="checkbox" ng-model="widget.data['target']"> {{'Animation plays as long as media element is visible' | trans}}</label>
                    </div>
                </div>

            </li>
            <li>

                <h3 class="uk-heading-divider">{{'Media' | trans}}</h3>

                <div class="uk-margin">
                    <span class="uk-form-label">{{'Display' | trans}}</span>
                    <div class="uk-form-controls uk-form-controls-text">
                        <label><input class="uk-checkbox" type="checkbox" ng-model="widget.data['media']"> {{'Show media' | trans}}</label>
                    </div>
                </div>

                <div class="uk-margin">
                    <label class="uk-form-label">{{'Image' | trans}}</label>
                    <div class="uk-form-controls">
                        <label><input class="uk-input uk-form-width-small" type="text" ng-model="widget.data['image_width']"> {{'Width (px)' | trans}}</label>
                        <div class="uk-margin-small">
                            <label><input class="uk-input uk-form-width-small" type="text" ng-model="widget.data['image_height']"> {{'Height (px)' | trans}}</label>
                        </div>
                    </div>
                </div>

            </li>
            <li>

                <h3 class="uk-heading-divider">{{'Text' | trans}}</h3>

                <div class="uk-margin">
                    <span class="uk-form-label">{{'Display' | trans}}</span>
                    <div class="uk-form-controls uk-form-controls-text">
                        <div class="uk-margin-small">
                            <label><input class="uk-checkbox" type="checkbox" ng-model="widget.data['title']"> {{'Show title' | trans}}</label>
                        </div>
                        <div class="uk-margin-small">
                            <label><input class="uk-checkbox" type="checkbox" ng-model="widget.data['content']"> {{'Show content' | trans}}</label>
                        </div>
                    </div>
                </div>

                <div class="uk-margin">
                    <label class="uk-form-label" for="wk-title-size">{{'Title Size' | trans}}</label>
                    <div class="uk-form-controls">
                        <select id="wk-title-size" class="uk-select uk-form-width-medium" ng-model="widget.data['title_size']">
                            <option value="h1">H1</option>
                            <option value="h2">H2</option>
                            <option value="h3">H3</option>
                            <option value="h4">H4</option>
                            <option value="h5">H5</option>
                            <option value="h6">H6</option>
                            <option value="medium">{{'Heading Medium' | trans}}</option>
                        </select>
                    </div>
                </div>

                <div class="uk-margin">
                    <label class="uk-form-label" for="wk-title-element">{{'Title Element' | trans}}</label>
                    <div class="uk-form-controls">
                        <select id="wk-title-element" class="uk-select uk-form-width-medium" ng-model="widget.data['title_element']">
                            <option value="h1">h1</option>
                            <option value="h2">h2</option>
                            <option value="h3">h3</option>
                            <option value="h4">h4</option>
                            <option value="h5">h5</option>
                            <option value="h6">h6</option>
                            <option value="div">div</option>
                        </select>
                    </div>
                </div>

                <div class="uk-margin">
                    <label class="uk-form-label" for="wk-content-size">{{'Content Size' | trans}}</label>
                    <div class="uk-form-controls">
                        <select id="wk-content-size" class="uk-select uk-form-width-medium" ng-model="widget.data['content_size']">
                            <option value="">{{'Default' | trans}}</option>
                            <option value="large">{{'Text Large' | trans}}</option>
                            <option value="h1">H1</option>
                            <option value="h2">H2</option>
                            <option value="h3">H3</option>
                            <option value="h4">H4</option>
                            <option value="h5">H5</option>
                            <option value="h6">H6</option>
                        </select>
                    </div>
                </div>

                <div class="uk-margin">
                    <label class="uk-form-label" for="wk-text-align">{{'Alignment' | trans}}</label>
                    <div class="uk-form-controls">
                        <select id="wk-text-align" class="uk-select uk-form-width-medium" ng-model="widget.data['text_align']">
                            <option value="left">{{'Left' | trans}}</option>
                            <option value="right">{{'Right' | trans}}</option>
                            <option value="center">{{'Center' | trans}}</option>
                        </select>
                    </div>
                </div>

                <h3 class="uk-heading-divider">{{'Link' | trans}}</h3>

                <div class="uk-margin">
                    <span class="uk-form-label">{{'Display' | trans}}</span>
                    <div class="uk-form-controls uk-form-controls-text">
                        <label><input class="uk-checkbox" type="checkbox" ng-model="widget.data['link']"> {{'Show link' | trans}}</label>
                    </div>
                </div>

                <div class="uk-margin">
                    <label class="uk-form-label" for="wk-link-style">{{'Style' | trans}}</label>
                    <div class="uk-form-controls">
                        <select id="wk-link-style" class="uk-select uk-form-width-medium" ng-model="widget.data['link_style']">
                            <option value="text">{{'Text' | trans}}</option>
                            <option value="button">{{'Button' | trans}}</option>
                            <option value="primary">{{'Button Primary' | trans}}</option>
                            <option value="button-large">{{'Button Large' | trans}}</option>
                            <option value="primary-large">{{'Button Large Primary' | trans}}</option>
                            <option value="button-link">{{'Button Link' | trans}}</option>
                        </select>
                    </div>
                </div>

                <div class="uk-margin">
                    <label class="uk-form-label" for="wk-link-text">{{'Text' | trans}}</label>
                    <div class="uk-form-controls">
                        <input id="wk-link-text" class="uk-input uk-form-width-medium" type="text" ng-model="widget.data['link_text']">
                    </div>
                </div>

                <h3 class="uk-heading-divider">{{'Width' | trans}}</h3>

                <div class="uk-margin">
                    <label class="uk-form-label" for="wk-width">{{'Phone Portrait' | trans}}</label>
                    <div class="uk-form-controls">
                        <select id="wk-width" class="uk-select uk-form-width-medium" ng-model="widget.data['width']">
                            <option value="1-2">50%</option>
                            <option value="3-5">60%</option>
                            <option value="2-3">66%</option>
                            <option value="3-4">75%</option>
                            <option value="4-5">80%</option>
                        </select>
                    </div>
                </div>

                <div class="uk-margin">
                    <label class="uk-form-label" for="wk-width-small">{{'Phone Landscape' | trans}}</label>
                    <div class="uk-form-controls">
                        <select id="wk-width-small" class="uk-select uk-form-width-medium" ng-model="widget.data['width_small']">
                            <option value="">{{'Inherit' | trans}}</option>
                            <option value="1-2">50%</option>
                            <option value="3-5">60%</option>
                            <option value="2-3">66%</option>
                            <option value="3-4">75%</option>
                            <option value="4-5">80%</option>
                        </select>
                    </div>
                </div>

                <div class="uk-margin">
                    <label class="uk-form-label" for="wk-width-medium">{{'Tablet' | trans}}</label>
                    <div class="uk-form-controls">
                        <select id="wk-width-medium" class="uk-select uk-form-width-medium" ng-model="widget.data['width_medium']">
                            <option value="">{{'Inherit' | trans}}</option>
                            <option value="1-2">50%</option>
                            <option value="3-5">60%</option>
                            <option value="2-3">66%</option>
                            <option value="3-4">75%</option>
                            <option value="4-5">80%</option>
                        </select>
                    </div>
                </div>

                <div class="uk-margin">
                    <label class="uk-form-label" for="wk-width-large">{{'Desktop' | trans}}</label>
                    <div class="uk-form-controls">
                        <select id="wk-width-large" class="uk-select uk-form-width-medium" ng-model="widget.data['width_large']">
                            <option value="">{{'Inherit' | trans}}</option>
                            <option value="1-3">33%</option>
                            <option value="2-5">40%</option>
                            <option value="1-2">50%</option>
                            <option value="3-5">60%</option>
                            <option value="2-3">66%</option>
                            <option value="3-4">75%</option>
                        </select>
                    </div>
                </div>

            </li>
            <li>

                <h3 class="uk-heading-divider">{{'General' | trans}}</h3>

                <div class="uk-margin">
                    <span class="uk-form-label">{{'Link Target' | trans}}</span>
                    <div class="uk-form-controls uk-form-controls-text">
                        <label><input class="uk-checkbox" type="checkbox" ng-model="widget.data['link_target']"> {{'Open all links in a new window' | trans}}</label>
                    </div>
                </div>

                <div class="uk-margin">
                    <label class="uk-form-label" for="wk-class">{{'HTML Class' | trans}}</label>
                    <div class="uk-form-controls">
                        <input id="wk-class" class="uk-input uk-form-width-medium" type="text" ng-model="widget.data['class']">
                    </div>
                </div>

            </li>
        </ul>

    </div>
</div>
