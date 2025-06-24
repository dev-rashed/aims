<?php

use App\Models\Setting;
use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Mgcodeur\CurrencyConverter\Facades\CurrencyConverter;

if (! function_exists('setting')) {
    /**
     * description
     */
    function setting($key, $default = null)
    {
        $setting = Setting::where('key', $key)->first();

        return $setting->value ?? $default;
    }
}

if (! function_exists('sectionSetting')) {
    /**
     * sectionSetting
     */
    function sectionSetting($key)
    {
        return setting('sections') != null ? json_decode(setting('sections'))->{$key} : false;
    }
}

if (! function_exists('translate')) {

    /**
     * translate
     */
    function translate($text, $vars = null)
    {
        return $vars !== null ? __("language.$text", $vars) : __("language.$text");
    }
}

if (! function_exists('generateSlug')) {
    /**
     * function generate unique slug
     */
    function generateSlug($slug = null)
    {
        return $slug != null ? Str::slug($slug) : Str::random();
    }
}

if (! function_exists('fileUpload')) {

    /**
     * upload file
     */
    function fileUpload($file, $folder, $current = null)
    {
        $filename = generateSlug().'.'.$file->getClientOriginalExtension();

        if ($current != null) {
            deleteUploadedFile($current);
        }

        if (! Storage::disk('public')->exists($folder)) {
            Storage::disk('public')->makeDirectory($folder);
        }

        return $file->storeAs($folder, $filename, 'public');
    }
}

if (! function_exists('uploadedFile')) {

    /**
     * get uploaded file
     */
    function uploadedFile($file)
    {
        if ($file != null && Storage::disk('public')->exists($file)) {
            return Storage::disk('public')->url($file);
        }

        return Storage::disk('public')->url(setting('default_image'));
    }
}

if (! function_exists('deleteUploadedFile')) {

    /**
     * delete uploaded file
     *
     * @param  mixed  $file
     * @return bool
     */
    function deleteUploadedFile($file)
    {
        if ($file != null && Storage::disk('public')->exists($file)) {
            Storage::disk('public')->delete($file);
        }

        return true;
    }
}

if (! function_exists('convertAmount')) {
    /**
     * convertAmount
     */
    function convertAmount($amount, $addCurrency = true, $from = 'GBP', $to = null)
    {
        if ($to == null) {
            $to = session()->get('currency')?->code ?? 'GBP';
        }

        if ($from != null && $to != null) {
            $amount = currencyConvert($amount ?? 0, $from, $to);
        }

        $value = number_format($amount, 2, '.', ',');
        if ($addCurrency) {
            if ($to != null) {
                $currency_symbol = DB::table('currencies')->where('code', $to)->value('symbol');
            }
            else {
                $currency_symbol = DB::table('currencies')->where('id', setting('currency_symbol'))->value('symbol');
            }
            if (setting('currency_position') == 'Before Amount') {
                return $currency_symbol.$value;
            }
            return $value.$currency_symbol;
        }
        return $value;
    }
}

if (! function_exists('formatDate')) {
    /**
     * formatDate
     *
     * @param  mixed  $amount
     * @return string
     */
    function formatDate($date = null, $isTime = false)
    {
        $date = $date != null ? $date : date('Y-m-d');

        if ($isTime) {
            return date(setting('date_format').' H:i A', strtotime($date));
        }

        return date(setting('date_format'), strtotime($date));
    }
}

if (! function_exists('generateInvoice')) {
    /**
     * function generate unique invoice
     *
     * @param  mixed  $invoice
     * @return string
     */
    function generateInvoice($id)
    {
        return setting('invoice_prefix', config('app.name')).sprintf('%s%05s', '', $id);
    }
}

if (! function_exists('countryISOCode')) {
    function countryISOCode($formatted = true)
    {
        $countries = array(
            "AF" => "+93",
            "AL" => "+355",
            "DZ" => "+213",
            "AS" => "+1-684",
            "AD" => "+376",
            "AO" => "+244",
            "AI" => "+1-264",
            "AG" => "+1-268",
            "AR" => "+54",
            "AM" => "+374",
            "AW" => "+297",
            "AU" => "+61",
            "AT" => "+43",
            "AZ" => "+994",
            "BS" => "+1-242",
            "BH" => "+973",
            "BD" => "+880",
            "BB" => "+1-246",
            "BY" => "+375",
            "BE" => "+32",
            "BZ" => "+501",
            "BJ" => "+229",
            "BM" => "+1-441",
            "BT" => "+975",
            "BO" => "+591",
            "BA" => "+387",
            "BW" => "+267",
            "BR" => "+55",
            "BN" => "+673",
            "BG" => "+359",
            "BF" => "+226",
            "BI" => "+257",
            "KH" => "+855",
            "CM" => "+237",
            "CA" => "+1",
            "CV" => "+238",
            "KY" => "+1-345",
            "CF" => "+236",
            "TD" => "+235",
            "CL" => "+56",
            "CN" => "+86",
            "CO" => "+57",
            "KM" => "+269",
            "CD" => "+243",
            "CG" => "+242",
            "CR" => "+506",
            "CI" => "+225",
            "HR" => "+385",
            "CU" => "+53",
            "CY" => "+357",
            "CZ" => "+420",
            "DK" => "+45",
            "DJ" => "+253",
            "DM" => "+1-767",
            "DO" => "+1-809, +1-829, +1-849",
            "EC" => "+593",
            "EG" => "+20",
            "SV" => "+503",
            "GQ" => "+240",
            "ER" => "+291",
            "EE" => "+372",
            "ET" => "+251",
            "FJ" => "+679",
            "FI" => "+358",
            "FR" => "+33",
            "GA" => "+241",
            "GM" => "+220",
            "GE" => "+995",
            "DE" => "+49",
            "GH" => "+233",
            "GR" => "+30",
            "GD" => "+1-473",
            "GT" => "+502",
            "GN" => "+224",
            "GW" => "+245",
            "GY" => "+592",
            "HT" => "+509",
            "HN" => "+504",
            "HU" => "+36",
            "IS" => "+354",
            "IN" => "+91",
            "ID" => "+62",
            "IR" => "+98",
            "IQ" => "+964",
            "IE" => "+353",
            "IL" => "+972",
            "IT" => "+39",
            "JM" => "+1-876",
            "JP" => "+81",
            "JO" => "+962",
            "KZ" => "+7",
            "KE" => "+254",
            "KI" => "+686",
            "KP" => "+850",
            "KR" => "+82",
            "KW" => "+965",
            "KG" => "+996",
            "LA" => "+856",
            "LV" => "+371",
            "LB" => "+961",
            "LS" => "+266",
            "LR" => "+231",
            "LY" => "+218",
            "LI" => "+423",
            "LT" => "+370",
            "LU" => "+352",
            "MG" => "+261",
            "MW" => "+265",
            "MY" => "+60",
            "MV" => "+960",
            "ML" => "+223",
            "MT" => "+356",
            "MH" => "+692",
            "MR" => "+222",
            "MU" => "+230",
            "MX" => "+52",
            "FM" => "+691",
            "MD" => "+373",
            "MC" => "+377",
            "MN" => "+976",
            "ME" => "+382",
            "MA" => "+212",
            "MZ" => "+258",
            "MM" => "+95",
            "NA" => "+264",
            "NR" => "+674",
            "NP" => "+977",
            "NL" => "+31",
            "NZ" => "+64",
            "NI" => "+505",
            "NE" => "+227",
            "NG" => "+234",
            "NO" => "+47",
            "OM" => "+968",
            "PK" => "+92",
            "PW" => "+680",
            "PS" => "+970",
            "PA" => "+507",
            "PG" => "+675",
            "PY" => "+595",
            "PE" => "+51",
            "PH" => "+63",
            "PL" => "+48",
            "PT" => "+351",
            "QA" => "+974",
            "RO" => "+40",
            "RU" => "+7",
            "RW" => "+250",
            "KN" => "+1-869",
            "LC" => "+1-758",
            "VC" => "+1-784",
            "WS" => "+685",
            "SM" => "+378",
            "ST" => "+239",
            "SA" => "+966",
            "SN" => "+221",
            "RS" => "+381",
            "SC" => "+248",
            "SL" => "+232",
            "SG" => "+65",
            "SK" => "+421",
            "SI" => "+386",
            "SB" => "+677",
            "SO" => "+252",
            "ZA" => "+27",
            "SS" => "+211",
            "ES" => "+34",
            "LK" => "+94",
            "SD" => "+249",
            "SR" => "+597",
            "SZ" => "+268",
            "SE" => "+46",
            "CH" => "+41",
            "SY" => "+963",
            "TW" => "+886",
            "TJ" => "+992",
            "TZ" => "+255",
            "TH" => "+66",
            "TL" => "+670",
            "TG" => "+228",
            "TO" => "+676",
            "TT" => "+1-868",
            "TN" => "+216",
            "TR" => "+90",
            "TM" => "+993",
            "TV" => "+688",
            "UG" => "+256",
            "UA" => "+380",
            "AE" => "+971",
            "GB" => "+44",
            "US" => "+1",
            "UY" => "+598",
            "UZ" => "+998",
            "VU" => "+678",
            "VA" => "+379",
            "VE" => "+58",
            "VN" => "+84",
            "YE" => "+967",
            "ZM" => "+260",
            "ZW" => "+263",
        );
        return $formatted ? array_values($countries) : $countries;
    }
}

if (! function_exists('getLocation')) {
    /**
     * get location details
     */
    function getLocation(string $address, $withAddress = false)
    {
        $key = env('GOOGLE_MAPS_API_KEY');
        $data = (new Client)->get("https://maps.googleapis.com/maps/api/geocode/json?address=$address&key=$key")->getBody(); // query/address
        $json = json_decode($data);

        if (count($json->results)) {
            $result = $json->results[0];

            $data = new stdClass;
            $data->lat = $result->geometry->location?->lat;
            $data->lng = $result->geometry->location?->lng;

            if ($withAddress) {
                $address_components = $result->address_components;
                foreach ($address_components as $address_component) {
                    $type = $address_component->types[0];
                    if ($type == 'locality') {
                        $data->city = $address_component->long_name;
                    }
                    if ($type == 'country') {
                        $data->country = $address_component->long_name;
                    }
                    if ($type == 'country') {
                        $data->countryCode = $address_component->short_name;
                    }
                    if ($type == 'administrative_area_level_1') {
                        $data->cityAlt = $address_component->long_name;
                    }
                }
            }

            return $data;
        }

        return false;
    }
}

if (! function_exists('course_lecture_count')) {
    /**
     * function generate unique invoice
     *
     * @param  string  $address
     * @return object
     */
    function course_lecture_count(object $modules)
    {
        $count = 0;
        foreach ($modules as $module) {
            $count += count(json_decode($module->lectures));
        }

        return $count;
    }
}

if (! function_exists('course_lecture_length')) {
    /**
     * function generate unique invoice
     *
     * @param  string  $address
     * @return object
     */
    function course_lecture_length(object $modules)
    {
        $arr = [];
        foreach ($modules as $module) {
            foreach (json_decode($module->lectures) as $lecture) {
                array_push($arr, gmdate('H:i:s', $lecture->duration));
            }
        }

        $total = 0;
        foreach ($arr as $element) {
            $temp = explode(':', $element);
            if (isset($temp[0]) && isset($temp[1]) && isset($temp[2])) {
                $total += (int) $temp[0] * 3600;
                $total += (int) $temp[1] * 60;
                $total += (int) $temp[2];
            }
        }

        // Format the seconds back into HH:MM:SS
        if (($total / 3600) >= 1) {
            return sprintf('%02dh %02dm %02ds', ($total / 3600), ($total / 60 % 60), $total % 60);
        }

        return sprintf('%02dm %02ds', ($total / 60 % 60), $total % 60);
    }
}

if (! function_exists('videoPaymentValidate')) {
    /**
     * function video payment validate
     *
     * @param  string  $address
     * @return object
     */
    function videoPaymentValidate()
    {
        $videoPayment = auth()->user()->videoPayments()?->latest('id')->first();

        return $videoPayment?->expire_date >= date('Y-m-d');
    }
}

if (! function_exists('membershipValidate')) {
    /**
     * function membership validate
     */
    function membershipValidate()
    {
        return auth()->user()->therapist?->membership_expire >= date('Y-m-d');
    }
}

if (! function_exists('imageFileValidationRule')) {
    /**
     * image file validation rule
     *
     * @return string
     */
    function imageFileValidationRule($isArray = false): array|string
    {
        return $isArray ? ['image','mimes:jpg,jpeg,png,bmp,webp,svg,webp','max:4096'] : '|image|mimes:jpg,jpeg,png,bmp,webp,svg,webp|max:4096';
    }
}

if (! function_exists('getTrx')) {
    function getTrx($length = 12)
    {
        $characters = 'ABCDEFGHJKMNOPQRSTUVWXYZ123456789';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }

        return $randomString;
    }
}

if (! function_exists('getCountryCode')) {
    function getCountryCode()
    {
        $codes = [
            '44' => 'UK (+44)',
            '1' => 'USA (+1)',
            '213' => 'Algeria (+213)',
            '376' => 'Andorra (+376)',
            '244' => 'Angola (+244)',
            '1264' => 'Anguilla (+1264)',
            '1268' => 'Antigua & Barbuda (+1268)',
            '54' => 'Argentina (+54)',
            '374' => 'Armenia (+374)',
            '297' => 'Aruba (+297)',
            '61' => 'Australia (+61)',
            '43' => 'Austria (+43)',
            '994' => 'Azerbaijan (+994)',
            '1242' => 'Bahamas (+1242)',
            '973' => 'Bahrain (+973)',
            '880' => 'Bangladesh (+880)',
            '1246' => 'Barbados (+1246)',
            '375' => 'Belarus (+375)',
            '32' => 'Belgium (+32)',
            '501' => 'Belize (+501)',
            '229' => 'Benin (+229)',
            '1441' => 'Bermuda (+1441)',
            '975' => 'Bhutan (+975)',
            '591' => 'Bolivia (+591)',
            '387' => 'Bosnia Herzegovina (+387)',
            '267' => 'Botswana (+267)',
            '55' => 'Brazil (+55)',
            '673' => 'Brunei (+673)',
            '359' => 'Bulgaria (+359)',
            '226' => 'Burkina Faso (+226)',
            '257' => 'Burundi (+257)',
            '855' => 'Cambodia (+855)',
            '237' => 'Cameroon (+237)',
            '1' => 'Canada (+1)',
            '238' => 'Cape Verde Islands (+238)',
            '1345' => 'Cayman Islands (+1345)',
            '236' => 'Central African Republic (+236)',
            '56' => 'Chile (+56)',
            '86' => 'China (+86)',
            '57' => 'Colombia (+57)',
            '269' => 'Comoros (+269)',
            '242' => 'Congo (+242)',
            '682' => 'Cook Islands (+682)',
            '506' => 'Costa Rica (+506)',
            '385' => 'Croatia (+385)',
            '53' => 'Cuba (+53)',
            '90392' => 'Cyprus North (+90392)',
            '357' => 'Cyprus South (+357)',
            '42' => 'Czech Republic (+42)',
            '45' => 'Denmark (+45)',
            '253' => 'Djibouti (+253)',
            '1809' => 'Dominica (+1809)',
            '1809' => 'Dominican Republic (+1809)',
            '593' => 'Ecuador (+593)',
            '20' => 'Egypt (+20)',
            '503' => 'El Salvador (+503)',
            '240' => 'Equatorial Guinea (+240)',
            '291' => 'Eritrea (+291)',
            '372' => 'Estonia (+372)',
            '251' => 'Ethiopia (+251)',
            '500' => 'Falkland Islands (+500)',
            '298' => 'Faroe Islands (+298)',
            '679' => 'Fiji (+679)',
            '358' => 'Finland (+358)',
            '33' => 'France (+33)',
            '594' => 'French Guiana (+594)',
            '689' => 'French Polynesia (+689)',
            '241' => 'Gabon (+241)',
            '220' => 'Gambia (+220)',
            '7880' => 'Georgia (+7880)',
            '49' => 'Germany (+49)',
            '233' => 'Ghana (+233)',
            '350' => 'Gibraltar (+350)',
            '30' => 'Greece (+30)',
            '299' => 'Greenland (+299)',
            '1473' => 'Grenada (+1473)',
            '590' => 'Guadeloupe (+590)',
            '671' => 'Guam (+671)',
            '502' => 'Guatemala (+502)',
            '224' => 'Guinea (+224)',
            '245' => 'Guinea - Bissau (+245)',
            '592' => 'Guyana (+592)',
            '509' => 'Haiti (+509)',
            '504' => 'Honduras (+504)',
            '852' => 'Hong Kong (+852)',
            '36' => 'Hungary (+36)',
            '354' => 'Iceland (+354)',
            '91' => 'India (+91)',
            '62' => 'Indonesia (+62)',
            '98' => 'Iran (+98)',
            '964' => 'Iraq (+964)',
            '353' => 'Ireland (+353)',
            '972' => 'Israel (+972)',
            '39' => 'Italy (+39)',
            '1876' => 'Jamaica (+1876)',
            '81' => 'Japan (+81)',
            '962' => 'Jordan (+962)',
            '7' => 'Kazakhstan (+7)',
            '254' => 'Kenya (+254)',
            '686' => 'Kiribati (+686)',
            '850' => 'Korea North (+850)',
            '82' => 'Korea South (+82)',
            '965' => 'Kuwait (+965)',
            '996' => 'Kyrgyzstan (+996)',
            '856' => 'Laos (+856)',
            '371' => 'Latvia (+371)',
            '961' => 'Lebanon (+961)',
            '266' => 'Lesotho (+266)',
            '231' => 'Liberia (+231)',
            '218' => 'Libya (+218)',
            '417' => 'Liechtenstein (+417)',
            '370' => 'Lithuania (+370)',
            '352' => 'Luxembourg (+352)',
            '853' => 'Macao (+853)',
            '389' => 'Macedonia (+389)',
            '261' => 'Madagascar (+261)',
            '265' => 'Malawi (+265)',
            '60' => 'Malaysia (+60)',
            '960' => 'Maldives (+960)',
            '223' => 'Mali (+223)',
            '356' => 'Malta (+356)',
            '692' => 'Marshall Islands (+692)',
            '596' => 'Martinique (+596)',
            '222' => 'Mauritania (+222)',
            '269' => 'Mayotte (+269)',
            '52' => 'Mexico (+52)',
            '691' => 'Micronesia (+691)',
            '373' => 'Moldova (+373)',
            '377' => 'Monaco (+377)',
            '976' => 'Mongolia (+976)',
            '1664' => 'Montserrat (+1664)',
            '212' => 'Morocco (+212)',
            '258' => 'Mozambique (+258)',
            '95' => 'Myanmar (+95)',
            '264' => 'Namibia (+264)',
            '674' => 'Nauru (+674)',
            '977' => 'Nepal (+977)',
            '31' => 'Netherlands (+31)',
            '687' => 'New Caledonia (+687)',
            '64' => 'New Zealand (+64)',
            '505' => 'Nicaragua (+505)',
            '227' => 'Niger (+227)',
            '234' => 'Nigeria (+234)',
            '683' => 'Niue (+683)',
            '672' => 'Norfolk Islands (+672)',
            '670' => 'Northern Marianas (+670)',
            '47' => 'Norway (+47)',
            '968' => 'Oman (+968)',
            '680' => 'Palau (+680)',
            '507' => 'Panama (+507)',
            '675' => 'Papua New Guinea (+675)',
            '595' => 'Paraguay (+595)',
            '51' => 'Peru (+51)',
            '63' => 'Philippines (+63)',
            '48' => 'Poland (+48)',
            '351' => 'Portugal (+351)',
            '1787' => 'Puerto Rico (+1787)',
            '974' => 'Qatar (+974)',
            '262' => 'Reunion (+262)',
            '40' => 'Romania (+40)',
            '7' => 'Russia (+7)',
            '250' => 'Rwanda (+250)',
            '378' => 'San Marino (+378)',
            '239' => 'Sao Tome & Principe (+239)',
            '966' => 'Saudi Arabia (+966)',
            '221' => 'Senegal (+221)',
            '381' => 'Serbia (+381)',
            '248' => 'Seychelles (+248)',
            '232' => 'Sierra Leone (+232)',
            '65' => 'Singapore (+65)',
            '421' => 'Slovak Republic (+421)',
            '386' => 'Slovenia (+386)',
            '677' => 'Solomon Islands (+677)',
            '252' => 'Somalia (+252)',
            '27' => 'South Africa (+27)',
            '34' => 'Spain (+34)',
            '94' => 'Sri Lanka (+94)',
            '290' => 'St. Helena (+290)',
            '1869' => 'St. Kitts (+1869)',
            '1758' => 'St. Lucia (+1758)',
            '249' => 'Sudan (+249)',
            '597' => 'Suriname (+597)',
            '268' => 'Swaziland (+268)',
            '46' => 'Sweden (+46)',
            '41' => 'Switzerland (+41)',
            '963' => 'Syria (+963)',
            '886' => 'Taiwan (+886)',
            '7' => 'Tajikstan (+7)',
            '66' => 'Thailand (+66)',
            '228' => 'Togo (+228)',
            '676' => 'Tonga (+676)',
            '1868' => 'Trinidad & Tobago (+1868)',
            '216' => 'Tunisia (+216)',
            '90' => 'Turkey (+90)',
            '7' => 'Turkmenistan (+7)',
            '993' => 'Turkmenistan (+993)',
            '1649' => 'Turks & Caicos Islands (+1649)',
            '688' => 'Tuvalu (+688)',
            '256' => 'Uganda (+256)',
            '380' => 'Ukraine (+380)',
            '971' => 'United Arab Emirates (+971)',
            '598' => 'Uruguay (+598)',
            '7' => 'Uzbekistan (+7)',
            '678' => 'Vanuatu (+678)',
            '379' => 'Vatican City (+379)',
            '58' => 'Venezuela (+58)',
            '84' => 'Vietnam (+84)',
            '84' => 'Virgin Islands - British (+1284)',
            '84' => 'Virgin Islands - US (+1340)',
            '681' => 'Wallis & Futuna (+681)',
            '969' => 'Yemen (North)(+969)',
            '967' => 'Yemen (South)(+967)',
            '260' => 'Zambia (+260)',
            '263' => 'Zimbabwe (+263)',
        ];

        return $codes;
    }
}

if (! function_exists('replaceModuleName')) {
    function replaceModuleName($name)
    {
        if (str_contains($name, 'Article')) {
            return str_replace('Article', 'Insight', $name);
        } elseif (str_contains($name, 'Counsellor')) {
            return str_replace('Counsellor', 'Contributor', $name);
        } elseif (str_contains($name, 'Therapist')) {
            return str_replace('Therapist', 'All Members', $name);
        } elseif (str_contains($name, 'Certificate')) {
            return str_replace('Certificate', 'Badge & Certificate', $name);
        } elseif (str_contains($name, 'Renew')) {
            return str_replace('Renew', 'Upgrade Member', $name);
        } elseif (str_contains($name, 'Review')) {
            return str_replace('Review', 'Testimonial', $name);
        }

        return $name;
    }
}

if (! function_exists('storeExceptionLog')) {
    /**
     * store exception log
     */
    function storeExceptionLog(Exception $e)
    {
        Log::emergency('File:'.$e->getFile().'Line:'.$e->getLine().'Message:'.$e->getMessage());

        return $e->getMessage();
    }
}

if (! function_exists('nextPayment')) {
    /**
     * store exception log
     */
    function nextPayment()
    {
        $payment_date = auth()->user()->payment?->created_at;
        $url = '<a href="'.route('payment.create').'" class="text-primary">payment</a>';

        if($payment_date != null) {
            $nextPayDate = match(auth()->user()?->therapist?->membership_type) {
                'monthly' => Carbon::createFromFormat('Y-m-d', Carbon::parse($payment_date)->format('Y-m-d'))->addMonth()->format('Y-m-d'),
                default => Carbon::createFromFormat('Y-m-d', Carbon::parse($payment_date)->format('Y-m-d'))->addYear()->format('Y-m-d')
            };

            if($nextPayDate < now()->subDays(10)->format('Y-m-d')) {
                return "Your payment date $nextPayDate, please $url now before date over.";
            }
            return true;
        }
        return "Please ensure $url.";

    }
}

if (!function_exists('avatarText')) {
    function avatarText($value)
    {
        if(!empty($value)) {
            $data = '';
            foreach (explode(' ', $value) as $val) {
                $data .= ucfirst(mb_substr($val, 0, 1));
            }
        }
        return $data ?? $value;
    }
}

if (!function_exists('paymentAmount')) {
    function paymentAmount()
    {
        return auth()->user()->therapist?->membership_type == 'monthly' ? auth()->user()->therapist?->membershipPlan?->monthly_price : auth()->user()->therapist?->membershipPlan?->yearly_price;
    }
}

if (!function_exists('currencyConvert')) {
    function currencyConvert($amount, $from = 'GBP', $to = 'GBP')
    {
        $amount = (float) $amount ?? 0;
        try {
            return CurrencyConverter::convert($amount ?? 0)->from($from)->to($to)->get();
        } catch (\Exception $e) {
            DB::table('currencies')->value('exchange_rate') * $amount ?? 0;
        }
    }
}
