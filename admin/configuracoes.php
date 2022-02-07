<?php include_once 'header.php'; ?>
<div id="main">
    <div class="wrapper">
        <div id="main_section" class="cf brdrrad_a">
            <div id="content_wrapper">
                <div id="main_content">
                    <h1 class="sepH_c">Configurações</h1>

                    <form action="" class="js_submit">
                        <div class="formEl_a">
                            <fieldset class="sepH_b">
                                <legend>Form elements <span class="small s_color">(class="formEl_a")</span></legend>
                                <div class="sepH_b">
                                    <label for="a_text" class="lbl_a">Text</label>
                                    <input type="text" id="a_text" name="a_text" class="inpt_a" />
                                </div>
                                <div class="sepH_b">
                                    <label for="a_password" class="lbl_a">Password</label>
                                    <input type="password" id="a_password" name="a_password" class="inpt_a" />
                                </div>
                                <div class="sepH_b">
                                    <label for="a_textarea" class="lbl_a">Textarea</label>
                                    <textarea id="a_textarea" name="a_textarea" cols="30" rows="10"></textarea>
                                </div>
                                <div class="sepH_b">
                                    <label for="a_select" class="lbl_a">Select</label>
                                    <select name="a_select" id="a_select">
                                        <option></option>
                                        <option value="option_1">1. Lorem ipsum dolor sit amet, consectetur</option>
                                        <option value="option_2">2. Lorem ipsum dolor sit amet, consectetur</option>
                                        <option value="option_3">3. Lorem ipsum dolor sit amet, consectetur</option>
                                    </select>
                                </div>
                                <div class="sepH_c">
                                    <label for="a_selectMulti" class="lbl_a">Multi select</label>
                                    <select name="a_selectMulti" id="a_selectMulti" multiple="multiple">
                                        <option value="option_1">1. Lorem ipsum dolor sit amet</option>
                                        <option value="option_2">2. Lorem ipsum dolor sit amet</option>
                                        <option value="option_3">3. Lorem ipsum dolor sit amet</option>
                                    </select>
                                    <span class="f_help">ctrl+click to select multiple items.</span>
                                </div>
                                <fieldset class="sepH_c">
                                    <legend>Checkboxes</legend>
                                    <div class="cf">
                                        <div class="dp33">
                                            <input type="checkbox" name="a_checkbox_Group" id="acheckbox_1" value="option_1" class="inpt_c" />
                                            <label for="acheckbox_1" class="lbl_c">Checkbox 1</label>
                                        </div>
                                        <div class="dp33">
                                            <input type="checkbox" name="a_checkbox_Group" id="acheckbox_2" value="option_2" class="inpt_c" />
                                            <label for="acheckbox_2" class="lbl_c">Checkbox 2</label>
                                        </div>
                                        <div class="dp33">
                                            <input type="checkbox" name="a_checkbox_Group" id="acheckbox_3" value="option_3" class="inpt_c" />
                                            <label for="acheckbox_3" class="lbl_c">Checkbox 3</label>
                                        </div>
                                    </div>
                                </fieldset>
                                <fieldset class="sepH_c">
                                    <legend>Radio buttons</legend>
                                    <div class="cf">
                                        <div class="dp33">
                                            <input type="radio" name="a_radio_Group" id="aradio_1" value="option_1" class="inpt_c" />
                                            <label for="aradio_1" class="lbl_c">Radio 1</label>
                                        </div>
                                        <div class="dp33">
                                            <input type="radio" name="a_radio_Group" id="aradio_2" value="option_2" class="inpt_c" />
                                            <label for="aradio_2" class="lbl_c">Radio 2</label>
                                            <span class="f_help">Radio 2 legend</span>
                                        </div>
                                        <div class="dp33">
                                            <input type="radio" name="a_radio_Group" id="aradio_3" value="option_3" class="inpt_c" />
                                            <label for="aradio_3" class="lbl_c">Radio 3</label>
                                        </div>
                                    </div>
                                </fieldset>
                                <button class="btn btn_c sepV_a"><span>Submit form</span></button>
                                <a href="#" class="vam clear_form">Clear form</a>
                            </fieldset>
                        </div>
                    </form>
                    <form action="" class="formEl_a" id="form_a">
                        <fieldset>
                            <legend>Form validation</legend>
                            <div class="msg_box msg_error" id="form_a_errors" style="display:none"></div>
                            <div class="sepH_b">
                                <label for="va_text" class="lbl_a">Title</label>
                                <input type="text" id="va_text" name="title" class="inpt_a" />
                            </div>
                            <div class="sepH_b">
                                <label for="va_password" class="lbl_a">Password</label>
                                <input type="password" id="va_password" name="password" class="inpt_a" />
                            </div>
                            <div class="sepH_b">
                                <label for="va_email" class="lbl_a">Email</label>
                                <input type="text" id="va_email" name="email" class="inpt_a" />
                            </div>
                            <div class="sepH_c">
                                <label for="va_textarea" class="lbl_a">Description</label>
                                <textarea id="va_textarea" cols="30" rows="10" name="description"></textarea>
                            </div>
                            <button class="btn btn_d sepV_a"><span>Submit form</span></button>
                            <a href="#" class="vam clear_form">Clear form</a>
                        </fieldset>
                    </form>
                    <form action="" class="js_submit">
                        <div class="formEl_b">
                            <fieldset class="sepH_b">
                                <legend>Form elements <span class="small s_color">(form with class="formEl_b")</span></legend>
                                <div class="sepH_b">
                                    <label for="b_text" class="lbl_a">Text</label>
                                    <input type="text" id="b_text" name="b_text" class="inpt_a" />
                                </div>
                                <div class="sepH_b">
                                    <label for="b_password" class="lbl_a">Password</label>
                                    <input type="password" id="b_password" name="b_password" class="inpt_a" />
                                </div>
                                <div class="sepH_b">
                                    <label for="b_textarea" class="lbl_a">Textarea</label>
                                    <textarea id="b_textarea" cols="30" rows="10" name="b_textarea"></textarea>
                                </div>
                                <div class="sepH_b">
                                    <label for="b_select" class="lbl_a">Select</label>
                                    <select name="b_select" id="b_select">
                                        <option></option>
                                        <option value="option_1">1. Lorem ipsum dolor sit amet, consectetur</option>
                                        <option value="option_2">2. Lorem ipsum dolor sit amet, consectetur</option>
                                        <option value="option_3">3. Lorem ipsum dolor sit amet, consectetur</option>
                                        <option value="option_4">4. Lorem ipsum dolor sit amet, consectetur</option>
                                        <option value="option_5">5. Lorem ipsum dolor sit amet, consectetur</option>
                                    </select>
                                </div>
                                <div class="sepH_c">
                                    <label for="b_selectMulti" class="lbl_a">Multi select</label>
                                    <div class="lblSpace">
                                        <select name="b_selectMulti" id="b_selectMulti" multiple="multiple">
                                            <option value="option_1">1. Lorem ipsum dolor sit amet</option>
                                            <option value="option_2">2. Lorem ipsum dolor sit amet</option>
                                            <option value="option_3">3. Lorem ipsum dolor sit amet</option>
                                            <option value="option_4">4. Lorem ipsum dolor sit amet</option>
                                            <option value="option_5">5. Lorem ipsum dolor sit amet</option>
                                        </select>
                                        <span class="f_help">ctrl+click to select multiple items.</span>
                                    </div>
                                </div>
                                <div class="sepH_c">
                                    <label class="lbl_a">Checkboxes</label>
                                    <div class="sepH_a lblSpace">
                                        <input type="checkbox" name="b_checkbox_Group" id="bcheckbox_1" value="option_1" class="inpt_c" />
                                        <label for="bcheckbox_1" class="lbl_c">Checkbox 1</label>
                                    </div>
                                    <div class="sepH_a lblSpace">
                                        <input type="checkbox" name="b_checkbox_Group" id="bcheckbox_2" value="option_2" class="inpt_c" />
                                        <label for="bcheckbox_2" class="lbl_c">Checkbox 2</label>
                                    </div>
                                    <div class="sepH_a lblSpace">
                                        <input type="checkbox" name="b_checkbox_Group" id="bcheckbox_3" value="option_3" class="inpt_c" />
                                        <label for="bcheckbox_3" class="lbl_c">Checkbox 3</label>
                                    </div>
                                </div>
                                <div class="sepH_c">
                                    <label class="lbl_a">Radio buttons</label>
                                    <div class="sepH_a lblSpace">
                                        <input type="radio" name="b_radio_Group" id="bradio_1" value="option_1" class="inpt_c" />
                                        <label for="bradio_1" class="lbl_c">Radio 1</label>
                                    </div>
                                    <div class="sepH_a lblSpace">
                                        <input type="radio" name="b_radio_Group" id="bradio_2" value="option_2" class="inpt_c" />
                                        <label for="bradio_2" class="lbl_c">Radio 2</label>
                                    </div>
                                    <div class="sepH_a lblSpace">
                                        <input type="radio" name="b_radio_Group" id="bradio_3" value="option_3" class="inpt_c" />
                                        <label for="bradio_3" class="lbl_c">Radio 3</label>
                                    </div>
                                </div>
                                <div class="lblSpace">
                                    <button class="btn btn_d sepV_a"><span>Submit form</span></button>
                                    <a href="#" class="vam clear_form">Clear form</a>
                                </div>
                            </fieldset>
                        </div>
                    </form>
                    <form action="" class="formEl_b" id="form_b">
                        <fieldset>
                            <legend>Form validation</legend>
                            <div class="sepH_b">
                                <label for="v_text" class="lbl_a">Text</label>
                                <input type="text" id="v_text" name="v_text" class="inpt_a required" minlength="5" />
                            </div>
                            <div class="sepH_b">
                                <label for="v_password" class="lbl_a">Password</label>
                                <input type="password" id="v_password" name="v_password" class="inpt_a required" />
                            </div>
                            <div class="sepH_b">
                                <label for="v_email" class="lbl_a">Email</label>
                                <input type="text" id="v_email" name="v_email" class="inpt_a required" />
                            </div>
                            <div class="sepH_b">
                                <label for="v_textarea" class="lbl_a">Textarea</label>
                                <textarea id="v_textarea" cols="30" rows="10" name="v_textarea" class="required"></textarea>
                            </div>
                            <div class="lblSpace">
                                <button class="btn btn_d sepV_a"><span>Submit form</span></button>
                                <a href="#" class="vam clear_form">Clear form</a>
                            </div>
                        </fieldset>
                    </form>
                    <form action="" class="js_submit">
                        <div class="formEl_b">
                            <fieldset class="sepH_b">
                                <legend>Aditional Form elements</legend>
                                <div class="sepH_c">
                                    <label for="adt_summary" class="lbl_a">Auto expanding Textarea</label>
                                    <textarea name="auto_expand_text" id="adt_summary" cols="30" rows="10" class="txtar_a expand40-100"></textarea>
                                </div>
                                <div class="sepH_c">
                                    <label class="lbl_a">File uploader</label>
                                    <div class="lblSpace">
                                        <div id="file_uploader" class="cf">		
                                            <noscript>			
                                            <div>
                                                <input type="file" name="file_upload" id="upload" />
                                            </div>
                                            </noscript>         
                                        </div>
                                    </div>
                                </div>
                                <div class="sepH_c">
                                    <label for="text" class="lbl_a">Tiny MCE with integrated file explorer</label>
                                    <textarea name="tinyMCE_text" id="text" cols="30" rows="10" class="tinymce txtar_a"></textarea>
                                </div>
                                <div class="sepH_c">
                                    <label for="country_simple" class="lbl_a">Enhanced standard select</label>
                                    <div class="lblSpace">
                                        <select data-placeholder="Choose a Country..." class="chzn-select" id="country_simple" name="country_simple">
                                            <option value=""></option>
                                            <option value="United States">United States</option> 
                                            <option value="United Kingdom">United Kingdom</option> 
                                            <option value="Afghanistan">Afghanistan</option> 
                                            <option value="Albania">Albania</option> 
                                            <option value="Algeria">Algeria</option> 
                                            <option value="American Samoa">American Samoa</option> 
                                            <option value="Andorra">Andorra</option> 
                                            <option value="Angola">Angola</option> 
                                            <option value="Anguilla">Anguilla</option> 
                                            <option value="Antarctica">Antarctica</option> 
                                            <option value="Antigua and Barbuda">Antigua and Barbuda</option> 
                                            <option value="Argentina">Argentina</option> 
                                            <option value="Armenia">Armenia</option> 
                                            <option value="Aruba">Aruba</option> 
                                            <option value="Australia">Australia</option> 
                                            <option value="Austria">Austria</option> 
                                            <option value="Azerbaijan">Azerbaijan</option> 
                                            <option value="Bahamas">Bahamas</option> 
                                            <option value="Bahrain">Bahrain</option> 
                                            <option value="Bangladesh">Bangladesh</option> 
                                            <option value="Barbados">Barbados</option> 
                                            <option value="Belarus">Belarus</option> 
                                            <option value="Belgium">Belgium</option> 
                                            <option value="Belize">Belize</option> 
                                            <option value="Benin">Benin</option> 
                                            <option value="Bermuda">Bermuda</option> 
                                            <option value="Bhutan">Bhutan</option> 
                                            <option value="Bolivia">Bolivia</option> 
                                            <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option> 
                                            <option value="Botswana">Botswana</option> 
                                            <option value="Bouvet Island">Bouvet Island</option> 
                                            <option value="Brazil">Brazil</option> 
                                            <option value="British Indian Ocean Territory">British Indian Ocean Territory</option> 
                                            <option value="Brunei Darussalam">Brunei Darussalam</option> 
                                            <option value="Bulgaria">Bulgaria</option> 
                                            <option value="Burkina Faso">Burkina Faso</option> 
                                            <option value="Burundi">Burundi</option> 
                                            <option value="Cambodia">Cambodia</option> 
                                            <option value="Cameroon">Cameroon</option> 
                                            <option value="Canada">Canada</option> 
                                            <option value="Cape Verde">Cape Verde</option> 
                                            <option value="Cayman Islands">Cayman Islands</option> 
                                            <option value="Central African Republic">Central African Republic</option> 
                                            <option value="Chad">Chad</option> 
                                            <option value="Chile">Chile</option> 
                                            <option value="China">China</option> 
                                            <option value="Christmas Island">Christmas Island</option> 
                                            <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option> 
                                            <option value="Colombia">Colombia</option> 
                                            <option value="Comoros">Comoros</option> 
                                            <option value="Congo">Congo</option> 
                                            <option value="Congo, The Democratic Republic of The">Congo, The Democratic Republic of The</option> 
                                            <option value="Cook Islands">Cook Islands</option> 
                                            <option value="Costa Rica">Costa Rica</option> 
                                            <option value="Cote D'ivoire">Cote D'ivoire</option> 
                                            <option value="Croatia">Croatia</option> 
                                            <option value="Cuba">Cuba</option> 
                                            <option value="Cyprus">Cyprus</option> 
                                            <option value="Czech Republic">Czech Republic</option> 
                                            <option value="Denmark">Denmark</option> 
                                            <option value="Djibouti">Djibouti</option> 
                                            <option value="Dominica">Dominica</option> 
                                            <option value="Dominican Republic">Dominican Republic</option> 
                                            <option value="Ecuador">Ecuador</option> 
                                            <option value="Egypt">Egypt</option> 
                                            <option value="El Salvador">El Salvador</option> 
                                            <option value="Equatorial Guinea">Equatorial Guinea</option> 
                                            <option value="Eritrea">Eritrea</option> 
                                            <option value="Estonia">Estonia</option> 
                                            <option value="Ethiopia">Ethiopia</option> 
                                            <option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option> 
                                            <option value="Faroe Islands">Faroe Islands</option> 
                                            <option value="Fiji">Fiji</option> 
                                            <option value="Finland">Finland</option> 
                                            <option value="France">France</option> 
                                            <option value="French Guiana">French Guiana</option> 
                                            <option value="French Polynesia">French Polynesia</option> 
                                            <option value="French Southern Territories">French Southern Territories</option> 
                                            <option value="Gabon">Gabon</option> 
                                            <option value="Gambia">Gambia</option> 
                                            <option value="Georgia">Georgia</option> 
                                            <option value="Germany">Germany</option> 
                                            <option value="Ghana">Ghana</option> 
                                            <option value="Gibraltar">Gibraltar</option> 
                                            <option value="Greece">Greece</option> 
                                            <option value="Greenland">Greenland</option> 
                                            <option value="Grenada">Grenada</option> 
                                            <option value="Guadeloupe">Guadeloupe</option> 
                                            <option value="Guam">Guam</option> 
                                            <option value="Guatemala">Guatemala</option> 
                                            <option value="Guinea">Guinea</option> 
                                            <option value="Guinea-bissau">Guinea-bissau</option> 
                                            <option value="Guyana">Guyana</option> 
                                            <option value="Haiti">Haiti</option> 
                                            <option value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald Islands</option> 
                                            <option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option> 
                                            <option value="Honduras">Honduras</option> 
                                            <option value="Hong Kong">Hong Kong</option> 
                                            <option value="Hungary">Hungary</option> 
                                            <option value="Iceland">Iceland</option> 
                                            <option value="India">India</option> 
                                            <option value="Indonesia">Indonesia</option> 
                                            <option value="Iran, Islamic Republic of">Iran, Islamic Republic of</option> 
                                            <option value="Iraq">Iraq</option> 
                                            <option value="Ireland">Ireland</option> 
                                            <option value="Israel">Israel</option> 
                                            <option value="Italy">Italy</option> 
                                            <option value="Jamaica">Jamaica</option> 
                                            <option value="Japan">Japan</option> 
                                            <option value="Jordan">Jordan</option> 
                                            <option value="Kazakhstan">Kazakhstan</option> 
                                            <option value="Kenya">Kenya</option> 
                                            <option value="Kiribati">Kiribati</option> 
                                            <option value="Korea, Democratic People's Republic of">Korea, Democratic People's Republic of</option> 
                                            <option value="Korea, Republic of">Korea, Republic of</option> 
                                            <option value="Kuwait">Kuwait</option> 
                                            <option value="Kyrgyzstan">Kyrgyzstan</option> 
                                            <option value="Lao People's Democratic Republic">Lao People's Democratic Republic</option> 
                                            <option value="Latvia">Latvia</option> 
                                            <option value="Lebanon">Lebanon</option> 
                                            <option value="Lesotho">Lesotho</option> 
                                            <option value="Liberia">Liberia</option> 
                                            <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option> 
                                            <option value="Liechtenstein">Liechtenstein</option> 
                                            <option value="Lithuania">Lithuania</option> 
                                            <option value="Luxembourg">Luxembourg</option> 
                                            <option value="Macao">Macao</option> 
                                            <option value="Macedonia, The Former Yugoslav Republic of">Macedonia, The Former Yugoslav Republic of</option> 
                                            <option value="Madagascar">Madagascar</option> 
                                            <option value="Malawi">Malawi</option> 
                                            <option value="Malaysia">Malaysia</option> 
                                            <option value="Maldives">Maldives</option> 
                                            <option value="Mali">Mali</option> 
                                            <option value="Malta">Malta</option> 
                                            <option value="Marshall Islands">Marshall Islands</option> 
                                            <option value="Martinique">Martinique</option> 
                                            <option value="Mauritania">Mauritania</option> 
                                            <option value="Mauritius">Mauritius</option> 
                                            <option value="Mayotte">Mayotte</option> 
                                            <option value="Mexico">Mexico</option> 
                                            <option value="Micronesia, Federated States of">Micronesia, Federated States of</option> 
                                            <option value="Moldova, Republic of">Moldova, Republic of</option> 
                                            <option value="Monaco">Monaco</option> 
                                            <option value="Mongolia">Mongolia</option> 
                                            <option value="Montenegro">Montenegro</option>
                                            <option value="Montserrat">Montserrat</option> 
                                            <option value="Morocco">Morocco</option> 
                                            <option value="Mozambique">Mozambique</option> 
                                            <option value="Myanmar">Myanmar</option> 
                                            <option value="Namibia">Namibia</option> 
                                            <option value="Nauru">Nauru</option> 
                                            <option value="Nepal">Nepal</option> 
                                            <option value="Netherlands">Netherlands</option> 
                                            <option value="Netherlands Antilles">Netherlands Antilles</option> 
                                            <option value="New Caledonia">New Caledonia</option> 
                                            <option value="New Zealand">New Zealand</option> 
                                            <option value="Nicaragua">Nicaragua</option> 
                                            <option value="Niger">Niger</option> 
                                            <option value="Nigeria">Nigeria</option> 
                                            <option value="Niue">Niue</option> 
                                            <option value="Norfolk Island">Norfolk Island</option> 
                                            <option value="Northern Mariana Islands">Northern Mariana Islands</option> 
                                            <option value="Norway">Norway</option> 
                                            <option value="Oman">Oman</option> 
                                            <option value="Pakistan">Pakistan</option> 
                                            <option value="Palau">Palau</option> 
                                            <option value="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option> 
                                            <option value="Panama">Panama</option> 
                                            <option value="Papua New Guinea">Papua New Guinea</option> 
                                            <option value="Paraguay">Paraguay</option> 
                                            <option value="Peru">Peru</option> 
                                            <option value="Philippines">Philippines</option> 
                                            <option value="Pitcairn">Pitcairn</option> 
                                            <option value="Poland">Poland</option> 
                                            <option value="Portugal">Portugal</option> 
                                            <option value="Puerto Rico">Puerto Rico</option> 
                                            <option value="Qatar">Qatar</option> 
                                            <option value="Reunion">Reunion</option> 
                                            <option value="Romania">Romania</option> 
                                            <option value="Russian Federation">Russian Federation</option> 
                                            <option value="Rwanda">Rwanda</option> 
                                            <option value="Saint Helena">Saint Helena</option> 
                                            <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option> 
                                            <option value="Saint Lucia">Saint Lucia</option> 
                                            <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option> 
                                            <option value="Saint Vincent and The Grenadines">Saint Vincent and The Grenadines</option> 
                                            <option value="Samoa">Samoa</option> 
                                            <option value="San Marino">San Marino</option> 
                                            <option value="Sao Tome and Principe">Sao Tome and Principe</option> 
                                            <option value="Saudi Arabia">Saudi Arabia</option> 
                                            <option value="Senegal">Senegal</option> 
                                            <option value="Serbia">Serbia</option> 
                                            <option value="Seychelles">Seychelles</option> 
                                            <option value="Sierra Leone">Sierra Leone</option> 
                                            <option value="Singapore">Singapore</option> 
                                            <option value="Slovakia">Slovakia</option> 
                                            <option value="Slovenia">Slovenia</option> 
                                            <option value="Solomon Islands">Solomon Islands</option> 
                                            <option value="Somalia">Somalia</option> 
                                            <option value="South Africa">South Africa</option> 
                                            <option value="South Georgia and The South Sandwich Islands">South Georgia and The South Sandwich Islands</option> 
                                            <option value="South Sudan">South Sudan</option> 
                                            <option value="Spain">Spain</option> 
                                            <option value="Sri Lanka">Sri Lanka</option> 
                                            <option value="Sudan">Sudan</option> 
                                            <option value="Suriname">Suriname</option> 
                                            <option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option> 
                                            <option value="Swaziland">Swaziland</option> 
                                            <option value="Sweden">Sweden</option> 
                                            <option value="Switzerland">Switzerland</option> 
                                            <option value="Syrian Arab Republic">Syrian Arab Republic</option> 
                                            <option value="Taiwan, Republic of China">Taiwan, Republic of China</option> 
                                            <option value="Tajikistan">Tajikistan</option> 
                                            <option value="Tanzania, United Republic of">Tanzania, United Republic of</option> 
                                            <option value="Thailand">Thailand</option> 
                                            <option value="Timor-leste">Timor-leste</option> 
                                            <option value="Togo">Togo</option> 
                                            <option value="Tokelau">Tokelau</option> 
                                            <option value="Tonga">Tonga</option> 
                                            <option value="Trinidad and Tobago">Trinidad and Tobago</option> 
                                            <option value="Tunisia">Tunisia</option> 
                                            <option value="Turkey">Turkey</option> 
                                            <option value="Turkmenistan">Turkmenistan</option> 
                                            <option value="Turks and Caicos Islands">Turks and Caicos Islands</option> 
                                            <option value="Tuvalu">Tuvalu</option> 
                                            <option value="Uganda">Uganda</option> 
                                            <option value="Ukraine">Ukraine</option> 
                                            <option value="United Arab Emirates">United Arab Emirates</option> 
                                            <option value="United Kingdom">United Kingdom</option> 
                                            <option value="United States">United States</option> 
                                            <option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option> 
                                            <option value="Uruguay">Uruguay</option> 
                                            <option value="Uzbekistan">Uzbekistan</option> 
                                            <option value="Vanuatu">Vanuatu</option> 
                                            <option value="Venezuela">Venezuela</option> 
                                            <option value="Viet Nam">Viet Nam</option> 
                                            <option value="Virgin Islands, British">Virgin Islands, British</option> 
                                            <option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option> 
                                            <option value="Wallis and Futuna">Wallis and Futuna</option> 
                                            <option value="Western Sahara">Western Sahara</option> 
                                            <option value="Yemen">Yemen</option> 
                                            <option value="Zambia">Zambia</option> 
                                            <option value="Zimbabwe">Zimbabwe</option>
                                        </select>
                                        <span class="f_help">Standard select with search functionality</span>
                                    </div>
                                </div>

                                <div class="sepH_c">
                                    <label for="country_multiple" class="lbl_a">Enhanced multiple select</label>
                                    <div class="lblSpace">
                                        <select data-placeholder="Choose a Country..." multiple class="chzn-select" id="country_multiple" name="country_multiple">
                                            <option value=""></option> 
                                            <option value="United States">United States</option> 
                                            <option value="United Kingdom">United Kingdom</option> 
                                            <option value="Afghanistan">Afghanistan</option> 
                                            <option value="Albania">Albania</option> 
                                            <option value="Algeria">Algeria</option> 
                                            <option value="American Samoa">American Samoa</option> 
                                            <option value="Andorra">Andorra</option> 
                                            <option value="Angola">Angola</option> 
                                            <option value="Anguilla">Anguilla</option> 
                                            <option value="Antarctica">Antarctica</option> 
                                            <option value="Antigua and Barbuda">Antigua and Barbuda</option> 
                                            <option value="Argentina">Argentina</option> 
                                            <option value="Armenia">Armenia</option> 
                                            <option value="Aruba">Aruba</option> 
                                            <option value="Australia">Australia</option> 
                                            <option value="Austria">Austria</option> 
                                            <option value="Azerbaijan">Azerbaijan</option> 
                                            <option value="Bahamas">Bahamas</option> 
                                            <option value="Bahrain">Bahrain</option> 
                                            <option value="Bangladesh">Bangladesh</option> 
                                            <option value="Barbados">Barbados</option> 
                                            <option value="Belarus">Belarus</option> 
                                            <option value="Belgium">Belgium</option> 
                                            <option value="Belize">Belize</option> 
                                            <option value="Benin">Benin</option> 
                                            <option value="Bermuda">Bermuda</option> 
                                            <option value="Bhutan">Bhutan</option> 
                                            <option value="Bolivia">Bolivia</option> 
                                            <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option> 
                                            <option value="Botswana">Botswana</option> 
                                            <option value="Bouvet Island">Bouvet Island</option> 
                                            <option value="Brazil">Brazil</option> 
                                            <option value="British Indian Ocean Territory">British Indian Ocean Territory</option> 
                                            <option value="Brunei Darussalam">Brunei Darussalam</option> 
                                            <option value="Bulgaria">Bulgaria</option> 
                                            <option value="Burkina Faso">Burkina Faso</option> 
                                            <option value="Burundi">Burundi</option> 
                                            <option value="Cambodia">Cambodia</option> 
                                            <option value="Cameroon">Cameroon</option> 
                                            <option value="Canada">Canada</option> 
                                            <option value="Cape Verde">Cape Verde</option> 
                                            <option value="Cayman Islands">Cayman Islands</option> 
                                            <option value="Central African Republic">Central African Republic</option> 
                                            <option value="Chad">Chad</option> 
                                            <option value="Chile">Chile</option> 
                                            <option value="China">China</option> 
                                            <option value="Christmas Island">Christmas Island</option> 
                                            <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option> 
                                            <option value="Colombia">Colombia</option> 
                                            <option value="Comoros">Comoros</option> 
                                            <option value="Congo">Congo</option> 
                                            <option value="Congo, The Democratic Republic of The">Congo, The Democratic Republic of The</option> 
                                            <option value="Cook Islands">Cook Islands</option> 
                                            <option value="Costa Rica">Costa Rica</option> 
                                            <option value="Cote D'ivoire">Cote D'ivoire</option> 
                                            <option value="Croatia">Croatia</option> 
                                            <option value="Cuba">Cuba</option> 
                                            <option value="Cyprus">Cyprus</option> 
                                            <option value="Czech Republic">Czech Republic</option> 
                                            <option value="Denmark">Denmark</option> 
                                            <option value="Djibouti">Djibouti</option> 
                                            <option value="Dominica">Dominica</option> 
                                            <option value="Dominican Republic">Dominican Republic</option> 
                                            <option value="Ecuador">Ecuador</option> 
                                            <option value="Egypt">Egypt</option> 
                                            <option value="El Salvador">El Salvador</option> 
                                            <option value="Equatorial Guinea">Equatorial Guinea</option> 
                                            <option value="Eritrea">Eritrea</option> 
                                            <option value="Estonia">Estonia</option> 
                                            <option value="Ethiopia">Ethiopia</option> 
                                            <option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option> 
                                            <option value="Faroe Islands">Faroe Islands</option> 
                                            <option value="Fiji">Fiji</option> 
                                            <option value="Finland">Finland</option> 
                                            <option value="France">France</option> 
                                            <option value="French Guiana">French Guiana</option> 
                                            <option value="French Polynesia">French Polynesia</option> 
                                            <option value="French Southern Territories">French Southern Territories</option> 
                                            <option value="Gabon">Gabon</option> 
                                            <option value="Gambia">Gambia</option> 
                                            <option value="Georgia">Georgia</option> 
                                            <option value="Germany">Germany</option> 
                                            <option value="Ghana">Ghana</option> 
                                            <option value="Gibraltar">Gibraltar</option> 
                                            <option value="Greece">Greece</option> 
                                            <option value="Greenland">Greenland</option> 
                                            <option value="Grenada">Grenada</option> 
                                            <option value="Guadeloupe">Guadeloupe</option> 
                                            <option value="Guam">Guam</option> 
                                            <option value="Guatemala">Guatemala</option> 
                                            <option value="Guinea">Guinea</option> 
                                            <option value="Guinea-bissau">Guinea-bissau</option> 
                                            <option value="Guyana">Guyana</option> 
                                            <option value="Haiti">Haiti</option> 
                                            <option value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald Islands</option> 
                                            <option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option> 
                                            <option value="Honduras">Honduras</option> 
                                            <option value="Hong Kong">Hong Kong</option> 
                                            <option value="Hungary">Hungary</option> 
                                            <option value="Iceland">Iceland</option> 
                                            <option value="India">India</option> 
                                            <option value="Indonesia">Indonesia</option> 
                                            <option value="Iran, Islamic Republic of">Iran, Islamic Republic of</option> 
                                            <option value="Iraq">Iraq</option> 
                                            <option value="Ireland">Ireland</option> 
                                            <option value="Israel">Israel</option> 
                                            <option value="Italy">Italy</option> 
                                            <option value="Jamaica">Jamaica</option> 
                                            <option value="Japan">Japan</option> 
                                            <option value="Jordan">Jordan</option> 
                                            <option value="Kazakhstan">Kazakhstan</option> 
                                            <option value="Kenya">Kenya</option> 
                                            <option value="Kiribati">Kiribati</option> 
                                            <option value="Korea, Democratic People's Republic of">Korea, Democratic People's Republic of</option> 
                                            <option value="Korea, Republic of">Korea, Republic of</option> 
                                            <option value="Kuwait">Kuwait</option> 
                                            <option value="Kyrgyzstan">Kyrgyzstan</option> 
                                            <option value="Lao People's Democratic Republic">Lao People's Democratic Republic</option> 
                                            <option value="Latvia">Latvia</option> 
                                            <option value="Lebanon">Lebanon</option> 
                                            <option value="Lesotho">Lesotho</option> 
                                            <option value="Liberia">Liberia</option> 
                                            <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option> 
                                            <option value="Liechtenstein">Liechtenstein</option> 
                                            <option value="Lithuania">Lithuania</option> 
                                            <option value="Luxembourg">Luxembourg</option> 
                                            <option value="Macao">Macao</option> 
                                            <option value="Macedonia, The Former Yugoslav Republic of">Macedonia, The Former Yugoslav Republic of</option> 
                                            <option value="Madagascar">Madagascar</option> 
                                            <option value="Malawi">Malawi</option> 
                                            <option value="Malaysia">Malaysia</option> 
                                            <option value="Maldives">Maldives</option> 
                                            <option value="Mali">Mali</option> 
                                            <option value="Malta">Malta</option> 
                                            <option value="Marshall Islands">Marshall Islands</option> 
                                            <option value="Martinique">Martinique</option> 
                                            <option value="Mauritania">Mauritania</option> 
                                            <option value="Mauritius">Mauritius</option> 
                                            <option value="Mayotte">Mayotte</option> 
                                            <option value="Mexico">Mexico</option> 
                                            <option value="Micronesia, Federated States of">Micronesia, Federated States of</option> 
                                            <option value="Moldova, Republic of">Moldova, Republic of</option> 
                                            <option value="Monaco">Monaco</option> 
                                            <option value="Mongolia">Mongolia</option> 
                                            <option value="Montenegro">Montenegro</option>
                                            <option value="Montserrat">Montserrat</option> 
                                            <option value="Morocco">Morocco</option> 
                                            <option value="Mozambique">Mozambique</option> 
                                            <option value="Myanmar">Myanmar</option> 
                                            <option value="Namibia">Namibia</option> 
                                            <option value="Nauru">Nauru</option> 
                                            <option value="Nepal">Nepal</option> 
                                            <option value="Netherlands">Netherlands</option> 
                                            <option value="Netherlands Antilles">Netherlands Antilles</option> 
                                            <option value="New Caledonia">New Caledonia</option> 
                                            <option value="New Zealand">New Zealand</option> 
                                            <option value="Nicaragua">Nicaragua</option> 
                                            <option value="Niger">Niger</option> 
                                            <option value="Nigeria">Nigeria</option> 
                                            <option value="Niue">Niue</option> 
                                            <option value="Norfolk Island">Norfolk Island</option> 
                                            <option value="Northern Mariana Islands">Northern Mariana Islands</option> 
                                            <option value="Norway">Norway</option> 
                                            <option value="Oman">Oman</option> 
                                            <option value="Pakistan">Pakistan</option> 
                                            <option value="Palau">Palau</option> 
                                            <option value="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option> 
                                            <option value="Panama">Panama</option> 
                                            <option value="Papua New Guinea">Papua New Guinea</option> 
                                            <option value="Paraguay">Paraguay</option> 
                                            <option value="Peru">Peru</option> 
                                            <option value="Philippines">Philippines</option> 
                                            <option value="Pitcairn">Pitcairn</option> 
                                            <option value="Poland">Poland</option> 
                                            <option value="Portugal">Portugal</option> 
                                            <option value="Puerto Rico">Puerto Rico</option> 
                                            <option value="Qatar">Qatar</option> 
                                            <option value="Reunion">Reunion</option> 
                                            <option value="Romania">Romania</option> 
                                            <option value="Russian Federation">Russian Federation</option> 
                                            <option value="Rwanda">Rwanda</option> 
                                            <option value="Saint Helena">Saint Helena</option> 
                                            <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option> 
                                            <option value="Saint Lucia">Saint Lucia</option> 
                                            <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option> 
                                            <option value="Saint Vincent and The Grenadines">Saint Vincent and The Grenadines</option> 
                                            <option value="Samoa">Samoa</option> 
                                            <option value="San Marino">San Marino</option> 
                                            <option value="Sao Tome and Principe">Sao Tome and Principe</option> 
                                            <option value="Saudi Arabia">Saudi Arabia</option> 
                                            <option value="Senegal">Senegal</option> 
                                            <option value="Serbia">Serbia</option> 
                                            <option value="Seychelles">Seychelles</option> 
                                            <option value="Sierra Leone">Sierra Leone</option> 
                                            <option value="Singapore">Singapore</option> 
                                            <option value="Slovakia">Slovakia</option> 
                                            <option value="Slovenia">Slovenia</option> 
                                            <option value="Solomon Islands">Solomon Islands</option> 
                                            <option value="Somalia">Somalia</option> 
                                            <option value="South Africa">South Africa</option> 
                                            <option value="South Georgia and The South Sandwich Islands">South Georgia and The South Sandwich Islands</option> 
                                            <option value="South Sudan">South Sudan</option> 
                                            <option value="Spain">Spain</option> 
                                            <option value="Sri Lanka">Sri Lanka</option> 
                                            <option value="Sudan">Sudan</option> 
                                            <option value="Suriname">Suriname</option> 
                                            <option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option> 
                                            <option value="Swaziland">Swaziland</option> 
                                            <option value="Sweden">Sweden</option> 
                                            <option value="Switzerland">Switzerland</option> 
                                            <option value="Syrian Arab Republic">Syrian Arab Republic</option> 
                                            <option value="Taiwan, Republic of China">Taiwan, Republic of China</option> 
                                            <option value="Tajikistan">Tajikistan</option> 
                                            <option value="Tanzania, United Republic of">Tanzania, United Republic of</option> 
                                            <option value="Thailand">Thailand</option> 
                                            <option value="Timor-leste">Timor-leste</option> 
                                            <option value="Togo">Togo</option> 
                                            <option value="Tokelau">Tokelau</option> 
                                            <option value="Tonga">Tonga</option> 
                                            <option value="Trinidad and Tobago">Trinidad and Tobago</option> 
                                            <option value="Tunisia">Tunisia</option> 
                                            <option value="Turkey">Turkey</option> 
                                            <option value="Turkmenistan">Turkmenistan</option> 
                                            <option value="Turks and Caicos Islands">Turks and Caicos Islands</option> 
                                            <option value="Tuvalu">Tuvalu</option> 
                                            <option value="Uganda">Uganda</option> 
                                            <option value="Ukraine">Ukraine</option> 
                                            <option value="United Arab Emirates">United Arab Emirates</option> 
                                            <option value="United Kingdom">United Kingdom</option> 
                                            <option value="United States">United States</option> 
                                            <option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option> 
                                            <option value="Uruguay">Uruguay</option> 
                                            <option value="Uzbekistan">Uzbekistan</option> 
                                            <option value="Vanuatu">Vanuatu</option> 
                                            <option value="Venezuela">Venezuela</option> 
                                            <option value="Viet Nam">Viet Nam</option> 
                                            <option value="Virgin Islands, British">Virgin Islands, British</option> 
                                            <option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option> 
                                            <option value="Wallis and Futuna">Wallis and Futuna</option> 
                                            <option value="Western Sahara">Western Sahara</option> 
                                            <option value="Yemen">Yemen</option> 
                                            <option value="Zambia">Zambia</option> 
                                            <option value="Zimbabwe">Zimbabwe</option>
                                        </select>
                                        <span class="f_help">Facebook Style Multi Select</span>
                                    </div>
                                </div>
                                <div class="sepH_c cf">
                                    <label for="timepicker" class="lbl_a">Datepicker & Timepicker</label>
                                    <input type="text" id="timepicker" class="inpt_b" readonly="readonly" name="timepicker" />
                                </div>
                                <div class="sepH_c cf">
                                    <label for="datepick" class="lbl_a">Datepicker</label>
                                    <input type="text" id="datepick" class="inpt_b datepicker" readonly="readonly" name="datepicker" />
                                </div>
                                <div class="sepH_c cf">
                                    <label class="lbl_a">Inline Datepicker</label>
                                    <div class="lblSpace">
                                        <div class="datepicker_inline"></div>
                                    </div>
                                </div>
                                <div class="sepH_c cf">
                                    <label class="lbl_a">Iphone style checkboxes</label>
                                    <div class="lblSpace">
                                        <div class="sepH_b">
                                            <input type="checkbox" id="disabled" disabled="disabled" class="disabled_checkbox" name="disabled_checkbox" />
                                            <span class="f_help">Disabled</span>
                                        </div>
                                        <div class="sepH_b">
                                            <input type="checkbox" id="on_off" name="on_off" class="on_off_checkbox" />
                                            <span class="f_help">Default</span>
                                        </div>
                                        <div>
                                            <input type="checkbox" id="agree_disagree" name="agree_disagree" class="agree_disagree_checkbox" checked="checked" />
                                            <span class="f_help">Custom labels</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="sepH_c cf">
                                    <label class="lbl_a">UI Sliders</label>
                                    <div class="lblSpace">
                                        <div class="sepH_c">
                                            <p class="sepH_a">Donation amount ($50 increments): <strong class="ui_slider1_val"></strong></p>
                                            <div class="ui_slider1"></div>
                                            <input type="hidden" name="ui_slider_default_val" id="ui_slider_default_val"/>
                                            <span class="f_help">Default slider</span>
                                        </div>
                                        <div class="sepH_b">
                                            <p class="sepH_a">Price Range: <strong class="ui_slider2_val"></strong></p>
                                            <div class="ui_slider2"></div>
                                            <input type="hidden" name="ui_slider_min" id="ui_slider_min_val" />
                                            <input type="hidden" name="ui_slider_max" id="ui_slider_max_val" />
                                            <span class="f_help">Range slider</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="sepH_c cf">
                                    <label class="lbl_a">UI Progresbar</label>
                                    <div class="lblSpace">
                                        <div id="progressbar" class="sepH_c"></div>
                                        <div class="ui_slider_progress"></div>
                                        <input type="hidden" name="progress_val" id="progress_val" />
                                        <span class="f_help">You can increase/decrease Progressbar value with this slider (for demo purposes).</span>
                                    </div>
                                </div>
                                <div class="sepH_c cf">
                                    <label class="lbl_a">Rating</label>
                                    <div class="lblSpace">
                                        <div class="sepH_b">
                                            <div id="rating_def"></div>
                                            <span class="f_help">Default rating</span>
                                        </div>
                                        <div class="sepH_b">
                                            <div id="rating_half"></div>
                                            <span class="f_help">Rating with half star.</span>
                                        </div>
                                        <div class="sepH_b">
                                            <div class="cf">
                                                <div id="rating_cancel" class="fl"></div>
                                                <p class="fl" id="raty_hint"></p>
                                            </div>
                                            <span class="f_help">Rating with cancel button and a hint.</span>
                                        </div>
                                        <div class="sepH_b">
                                            <div id="rating_custom"></div>
                                            <span class="f_help">Custom rating.</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="lblSpace">
                                    <button class="btn btn_b sepV_a"><span>Submit form</span></button>
                                </div>
                            </fieldset>
                        </div>
                    </form>
                </div>
            </div>
            <?php include_once 'sidebar.php'; ?>
        </div>
    </div>
</div>
<?php include_once 'footer.php'; ?>
<script type="text/javascript">
    head.js("js/jquery-1.6.2.min.js");
    head.js("lib/jquery-ui/jquery-ui-1.8.15.custom.min.js");
    head.js("lib/harvesthq-chosen/chosen.jquery.min.js");
    head.js("lib/fusion-charts/FusionCharts.js");
    head.js("lib/fancybox/jquery.easing-1.3.pack.js");
    head.js("lib/fancybox/jquery.fancybox-1.3.4.pack.js");
    head.js("lib/file-uploader/fileuploader.js");
    head.js("lib/tiny-mce/jquery.tinymce.js");
    head.js("js/jquery.microaccordion.js");
    head.js("js/jquery.tools.min.js");
    head.js("js/jquery.stickyPanel.js");
    head.js("js/xbreadcrumbs.js");
    head.js("lib/jquery-validation/jquery.validate.js");
    head.js("lib/styled-checkboxes/iphone-style-checkboxes.js");
    head.js("lib/jquery-raty/jquery.raty.min.js");
    head.js("lib/timepicker-addon/jquery-ui-timepicker-addon.js");
    head.js("js/lagu.js");

    head.ready(function(){
        lga_fusionCharts.chart_k();
        lga_selectBox.init();
        lga_datepicker.init();
        lga_datepicker_inline.init();
        lga_editor_default.init();
        lga_fileUpload.init();
        lga_clearForm.init();
        lga_styledCheckboxes.init();
        lga_uiSliders.init();
        lga_uiProgressBar.init();
        lga_rating.init();
        lga_timepicker.init();
        lga_form_a_validation.init();
        lga_form_b_validation.init();
        lga_formSubmit.init();
    });
</script>
</body>
</html>