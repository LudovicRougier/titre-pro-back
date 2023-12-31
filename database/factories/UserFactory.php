<?php

namespace Database\Factories;

use App\Enums\CountryEnum;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{

    protected $genres = [
        [
            "id" => "28",
            "name" => "Action"
        ],
        [
            "id" => "10759",
            "name" => "Action & Adventure"
        ],
        [
            "id" => "12",
            "name" => "Adventure"
        ],
        [
            "id" => "16",
            "name" => "Animation"
        ],
        [
            "id" => "35",
            "name" => "Comedy"
        ],
        [
            "id" => "80",
            "name" => "Crime"
        ],
        [
            "id" => "99",
            "name" => "Documentary"
        ],
        [
            "id" => "18",
            "name" => "Drama"
        ],
        [
            "id" => "10751",
            "name" => "Family"
        ],
        [
            "id" => "14",
            "name" => "Fantasy"
        ],
        [
            "id" => "36",
            "name" => "History"
        ],
        [
            "id" => "27",
            "name" => "Horror"
        ],
        [
            "id" => "10762",
            "name" => "Kids"
        ],
    ];

    protected $providers = [
        [
            "provider_id" => "156",
            "provider_name" => "A&E",
            "display_priority" => 67,
            "logo_path" => "\/ujE7L9z0Ceu1T74RcahVn1FMbbK.jpg"
        ],
        [
            "provider_id" => "148",
            "provider_name" => "ABC",
            "display_priority" => 55,
            "logo_path" => "\/l9BRdAgQ3MkooOalsuu3yFQv2XP.jpg"
        ],
        [
            "provider_id" => "398",
            "provider_name" => "AHCTV",
            "display_priority" => 143,
            "logo_path" => "\/gxCvG3STez0PrDqi05LSYyWjLPk.jpg"
        ],
        [
            "provider_id" => "80",
            "provider_name" => "AMC",
            "display_priority" => 58,
            "logo_path" => "\/dTKs9JkJl06hnbnqUXHAxUwZrUS.jpg"
        ],
        [
            "provider_id" => "1854",
            "provider_name" => "AMC Plus Apple TV Channel ",
            "display_priority" => 19,
            "logo_path" => "\/yFgm7vxwKZ4jfXIlPizlgoba2yi.jpg"
        ],
        [
            "provider_id" => "352",
            "provider_name" => "AMC on Demand",
            "display_priority" => 136,
            "logo_path" => "\/kJlVJLgbNPvKDYC0YMp3yA2OKq2.jpg"
        ],
        [
            "provider_id" => "526",
            "provider_name" => "AMC+",
            "display_priority" => 34,
            "logo_path" => "\/xlonQMSmhtA2HHwK3JKF9ghx7M8.jpg"
        ],
        [
            "provider_id" => "528",
            "provider_name" => "AMC+ Amazon Channel",
            "display_priority" => 27,
            "logo_path" => "\/9edKQczyuMmQM1yS520hgmJbcaC.jpg"
        ],
        [
            "provider_id" => "635",
            "provider_name" => "AMC+ Roku Premium Channel",
            "display_priority" => 33,
            "logo_path" => "\/ni2NgPmIqqJRXeiA8Zdj4UhBZnU.jpg"
        ],
        [
            "provider_id" => "529",
            "provider_name" => "ARROW",
            "display_priority" => 176,
            "logo_path" => "\/4UfmxLzph9Aso9pr9bXohp0V3sr.jpg"
        ],
        [
            "provider_id" => "87",
            "provider_name" => "Acorn TV",
            "display_priority" => 72,
            "logo_path" => "\/5P99DkK1jVs95KcE8bYG9MBtGQ.jpg"
        ],
        [
            "provider_id" => "196",
            "provider_name" => "AcornTV Amazon Channel",
            "display_priority" => 124,
            "logo_path" => "\/8WWD7t5Irwq9kAH4rufQ4Pe1Dog.jpg"
        ],
        [
            "provider_id" => "318",
            "provider_name" => "Adult Swim",
            "display_priority" => 129,
            "logo_path" => "\/sPlIWhBAcoyw2IWuQ2PDdToNXld.jpg"
        ],
        [
            "provider_id" => "547",
            "provider_name" => "Alamo on Demand",
            "display_priority" => 179,
            "logo_path" => "\/1UP7ysjKolfD0rmp2fLmvyRHkdn.jpg"
        ],
        [
            "provider_id" => "9",
            "provider_name" => "Amazon Prime Video",
            "display_priority" => 1,
            "logo_path" => "\/emthp39XA2YScoYL1p0sdbAH2WA.jpg"
        ],
        [
            "provider_id" => "10",
            "provider_name" => "Amazon Video",
            "display_priority" => 12,
            "logo_path" => "\/5NyLm42TmCqCMOZFvH4fcoSNKEW.jpg"
        ],
        [
            "provider_id" => "399",
            "provider_name" => "Animal Planet",
            "display_priority" => 150,
            "logo_path" => "\/fXcLPLz67yG0JzLWXIsNJrdwRzr.jpg"
        ],
        [
            "provider_id" => "2",
            "provider_name" => "Apple TV",
            "display_priority" => 2,
            "logo_path" => "\/peURlLlr8jggOwK53fJ5wdQl05y.jpg"
        ],
        [
            "provider_id" => "350",
            "provider_name" => "Apple TV Plus",
            "display_priority" => 9,
            "logo_path" => "\/6uhKBfmtzFqOcLousHwZuzcrScK.jpg"
        ],
        [
            "provider_id" => "514",
            "provider_name" => "AsianCrush",
            "display_priority" => 164,
            "logo_path" => "\/3VxDqUk25KU5860XxHKwV9cy3L8.jpg"
        ],
        [
            "provider_id" => "397",
            "provider_name" => "BBC America",
            "display_priority" => 141,
            "logo_path" => "\/ukSXbR5qFjO2qCHpc6ZhcGPSjTJ.jpg"
        ],
        [
            "provider_id" => "1759",
            "provider_name" => "Bet+",
            "display_priority" => 205,
            "logo_path" => "\/eZVDDqlBHpuk8GELhQchRIkA6th.jpg"
        ],
        [
            "provider_id" => "343",
            "provider_name" => "Bet+ Amazon Channel",
            "display_priority" => 132,
            "logo_path" => "\/obBJU4ak4XvAOUM5iVmSUxDvqC3.jpg"
        ],
        [
            "provider_id" => "248",
            "provider_name" => "Boomerang",
            "display_priority" => 80,
            "logo_path" => "\/oRXiHzPl2HJMXXFR4eebsb8F5Oc.jpg"
        ],
        [
            "provider_id" => "288",
            "provider_name" => "Boomerang Amazon Channel",
            "display_priority" => 96,
            "logo_path" => "\/1zfRJQc14uEzZThdwNvxtxeWJw6.jpg"
        ],
        [
            "provider_id" => "365",
            "provider_name" => "Bravo TV",
            "display_priority" => 138,
            "logo_path" => "\/cezAIHmsUVvgAahfCR7J0z30y1N.jpg"
        ],
        [
            "provider_id" => "151",
            "provider_name" => "BritBox",
            "display_priority" => 22,
            "logo_path" => "\/aGIS8maihUm60A3moKYD9gfYHYT.jpg"
        ],
        [
            "provider_id" => "197",
            "provider_name" => "BritBox Amazon Channel",
            "display_priority" => 123,
            "logo_path" => "\/xTfyFZqWv8c8sxlFooUzemi6WRM.jpg"
        ],
        [
            "provider_id" => "1852",
            "provider_name" => "Britbox Apple TV Channel ",
            "display_priority" => 20,
            "logo_path" => "\/cN85Wjk0FIFr3z6rbiimz10uWVo.jpg"
        ],
        [
            "provider_id" => "571",
            "provider_name" => "British Pathé TV",
            "display_priority" => 190,
            "logo_path" => "\/3VHvcxjJBMRdYZa76vsK8i46TOV.jpg"
        ],
        [
            "provider_id" => "554",
            "provider_name" => "BroadwayHD",
            "display_priority" => 16,
            "logo_path" => "\/xLu1rkZNOKuNnRNr70wySosfTBf.jpg"
        ],
        [
            "provider_id" => "206",
            "provider_name" => "CW Seed",
            "display_priority" => 40,
            "logo_path" => "\/7UpZTaQFcdISOzDOBMx6RavcaR.jpg"
        ],
        [
            "provider_id" => "317",
            "provider_name" => "Cartoon Network",
            "display_priority" => 128,
            "logo_path" => "\/A5vrIl7YqlmNrOHZikrtO41V0sY.jpg"
        ],
        [
            "provider_id" => "438",
            "provider_name" => "Chai Flicks",
            "display_priority" => 116,
            "logo_path" => "\/3tCqvc5hPm5nl8Hm8o2koDRZlPo.jpg"
        ],
        [
            "provider_id" => "289",
            "provider_name" => "Cinemax Amazon Channel",
            "display_priority" => 98,
            "logo_path" => "\/kEnyHRflZPNWEOIXroZPhfdGi46.jpg"
        ],
        [
            "provider_id" => "445",
            "provider_name" => "Classix",
            "display_priority" => 5,
            "logo_path" => "\/iaMw6nOyxUzXSacrLQ0Au6CfZkc.jpg"
        ],
        [
            "provider_id" => "1811",
            "provider_name" => "Cohen Media Amazon Channel",
            "display_priority" => 227,
            "logo_path" => "\/jV7sSPzUYYHHmoATkD9PhFoEZXb.jpg"
        ],
        [
            "provider_id" => "243",
            "provider_name" => "Comedy Central",
            "display_priority" => 51,
            "logo_path" => "\/gmU9aPV3XUFusVs4kK1rcICUKqL.jpg"
        ],
        [
            "provider_id" => "400",
            "provider_name" => "Cooking Channel",
            "display_priority" => 155,
            "logo_path" => "\/aTiukuAuttjE2OdGv1eUhk3xsi0.jpg"
        ],
        [
            "provider_id" => "12",
            "provider_name" => "Crackle",
            "display_priority" => 57,
            "logo_path" => "\/7P2JHkfv4AmU2MgSPGaJ0z6nNLG.jpg"
        ],
        [
            "provider_id" => "258",
            "provider_name" => "Criterion Channel",
            "display_priority" => 45,
            "logo_path" => "\/4TJTNWd2TT1kYj6ocUEsQc8WRgr.jpg"
        ],
        [
            "provider_id" => "283",
            "provider_name" => "Crunchyroll",
            "display_priority" => 15,
            "logo_path" => "\/8Gt1iClBlzTeQs8WQm8UrCoIxnQ.jpg"
        ],
        [
            "provider_id" => "692",
            "provider_name" => "Cultpix",
            "display_priority" => 9,
            "logo_path" => "\/59azlQKUgFdYq6QI5QEAxIeecyL.jpg"
        ],
        [
            "provider_id" => "190",
            "provider_name" => "Curiosity Stream",
            "display_priority" => 11,
            "logo_path" => "\/67Ee4E6qOkQGHeUTArdJ1qRxzR2.jpg"
        ],
        [
            "provider_id" => "358",
            "provider_name" => "DIRECTV",
            "display_priority" => 56,
            "logo_path" => "\/xL9SUR63qrEjFZAhtsipskeAMR7.jpg"
        ],
        [
            "provider_id" => "405",
            "provider_name" => "DIY Network",
            "display_priority" => 146,
            "logo_path" => "\/odh8CexN7yXa7IX4aIYtsUc0vHY.jpg"
        ],
        [
            "provider_id" => "475",
            "provider_name" => "DOCSVILLE",
            "display_priority" => 13,
            "logo_path" => "\/bvcdVO7SDHKEa6D40g1jntXKNj.jpg"
        ],
        [
            "provider_id" => "355",
            "provider_name" => "Darkmatter TV",
            "display_priority" => 135,
            "logo_path" => "\/x4AFz5koB2R8BRn8WNh6EqXUGHc.jpg"
        ],
        [
            "provider_id" => "444",
            "provider_name" => "Dekkoo",
            "display_priority" => 18,
            "logo_path" => "\/u2H29LCxRzjZVUoZUQAHKm5P8Zc.jpg"
        ],
        [
            "provider_id" => "402",
            "provider_name" => "Destination America",
            "display_priority" => 149,
            "logo_path" => "\/xZMxO6tGdeMmKxIvT4QjPz59ujm.jpg"
        ],
        [
            "provider_id" => "403",
            "provider_name" => "Discovery",
            "display_priority" => 152,
            "logo_path" => "\/dfz7hQm0icTUdXJrScZXPMeO963.jpg"
        ],
        [
            "provider_id" => "404",
            "provider_name" => "Discovery Life",
            "display_priority" => 151,
            "logo_path" => "\/3LGhdwqMB0iuEwidFusc0I38Omm.jpg"
        ],
        [
            "provider_id" => "584",
            "provider_name" => "Discovery Plus Amazon Channel",
            "display_priority" => 25,
            "logo_path" => "\/a2OcajC4bM5ItniQdjyOV7tgthW.jpg"
        ],
        [
            "provider_id" => "337",
            "provider_name" => "Disney Plus",
            "display_priority" => 1,
            "logo_path" => "\/7rwgEs15tFwyR9NPQ5vpzxTj19Q.jpg"
        ],
        [
            "provider_id" => "508",
            "provider_name" => "DisneyNOW",
            "display_priority" => 173,
            "logo_path" => "\/pu5I5Fis0r7ReAOswcJzOKmdLrK.jpg"
        ],
        [
            "provider_id" => "569",
            "provider_name" => "DocAlliance Films",
            "display_priority" => 20,
            "logo_path" => "\/aQ1ritN00jXc7RAFfUoQKGAAfp7.jpg"
        ],
        [
            "provider_id" => "536",
            "provider_name" => "Dogwoof On Demand",
            "display_priority" => 185,
            "logo_path" => "\/9sk88OAxDZSdMOzg8VuqtGpgWQ3.jpg"
        ],
        [
            "provider_id" => "254",
            "provider_name" => "Dove Channel",
            "display_priority" => 82,
            "logo_path" => "\/cBCzPOX6ir5L8hCoJlfIWycxauh.jpg"
        ],
        [
            "provider_id" => "263",
            "provider_name" => "DreamWorksTV Amazon Channel",
            "display_priority" => 161,
            "logo_path" => "\/1Vzd0eRyJJ7djh0GuZczx4ap8PK.jpg"
        ],
        [
            "provider_id" => "1768",
            "provider_name" => "ESPN Plus",
            "display_priority" => 211,
            "logo_path" => "\/iJBj5b4HYbjEPiwKJWQfcRr3nP2.jpg"
        ],
        [
            "provider_id" => "218",
            "provider_name" => "Eros Now",
            "display_priority" => 85,
            "logo_path" => "\/4XYI2rzRm34skcvamytegQx7Dmu.jpg"
        ],
        [
            "provider_id" => "677",
            "provider_name" => "Eventive",
            "display_priority" => 8,
            "logo_path" => "\/fadQYOyKL0tqfyj012nYJxm3N2I.jpg"
        ],
        [
            "provider_id" => "471",
            "provider_name" => "FILMRISE",
            "display_priority" => 165,
            "logo_path" => "\/mEiBVz62M9j3TCebmOspMfqkIn.jpg"
        ],
        [
            "provider_id" => "123",
            "provider_name" => "FXNow",
            "display_priority" => 47,
            "logo_path" => "\/twV9iQPYeaoBzwsfRFGMGoMIUg8.jpg"
        ],
        [
            "provider_id" => "25",
            "provider_name" => "Fandor",
            "display_priority" => 60,
            "logo_path" => "\/eAhAUvV2ouai3cGti5y70YOtrBN.jpg"
        ],
        [
            "provider_id" => "199",
            "provider_name" => "Fandor Amazon Channel",
            "display_priority" => 125,
            "logo_path" => "\/8vBJZkwkrUDYMSfmw5R0ZENd7yw.jpg"
        ],
        [
            "provider_id" => "579",
            "provider_name" => "Film Movement Plus",
            "display_priority" => 192,
            "logo_path" => "\/tKJdVrC0fjEtQtYYjlVwX9rmqrj.jpg"
        ],
        [
            "provider_id" => "701",
            "provider_name" => "FilmBox+",
            "display_priority" => 4,
            "logo_path" => "\/4FqTBYsUSZgS9z9UGKgxSDBbtc8.jpg"
        ],
        [
            "provider_id" => "559",
            "provider_name" => "Filmzie",
            "display_priority" => 17,
            "logo_path" => "\/olmH7t5tEng8Yuq33KmvpvaaVIg.jpg"
        ],
        [
            "provider_id" => "432",
            "provider_name" => "Flix Premiere",
            "display_priority" => 162,
            "logo_path" => "\/6fX0J6x7zXsUCvPFczgOW4oD34D.jpg"
        ],
        [
            "provider_id" => "331",
            "provider_name" => "FlixFling",
            "display_priority" => 133,
            "logo_path" => "\/4U02VrbgLfUKJAUCHKzxWFtnPx4.jpg"
        ],
        [
            "provider_id" => "366",
            "provider_name" => "Food Network",
            "display_priority" => 140,
            "logo_path" => "\/auXCWejtQmZL7DplgokLXYq73Ed.jpg"
        ],
        [
            "provider_id" => "328",
            "provider_name" => "Fox",
            "display_priority" => 131,
            "logo_path" => "\/rbCRT408gY44bZH0KdtmKzoituI.jpg"
        ],
        [
            "provider_id" => "211",
            "provider_name" => "Freeform",
            "display_priority" => 64,
            "logo_path" => "\/rgpmwMkXqFYch9cway9qWMw0uXu.jpg"
        ],
        [
            "provider_id" => "613",
            "provider_name" => "Freevee",
            "display_priority" => 196,
            "logo_path" => "\/uBE4RMH15mrkuz6vXzuJc7ZLXp1.jpg"
        ],
        [
            "provider_id" => "269",
            "provider_name" => "Funimation Now",
            "display_priority" => 28,
            "logo_path" => "\/fWq61Fy4onav0wZJTA3c2fs0G66.jpg"
        ],
        [
            "provider_id" => "3",
            "provider_name" => "Google Play Movies",
            "display_priority" => 1,
            "logo_path" => "\/tbEdFQDwx5LEVr8WpSeXQSIirVq.jpg"
        ],
        [
            "provider_id" => "100",
            "provider_name" => "GuideDoc",
            "display_priority" => 7,
            "logo_path" => "\/iX0pvJ2GFATbVIH5IHMwG0ffIdV.jpg"
        ],
        [
            "provider_id" => "384",
            "provider_name" => "HBO Max",
            "display_priority" => 8,
            "logo_path" => "\/Ajqyt5aNxNGjmF9uOfxArGrdf3X.jpg"
        ],
        [
            "provider_id" => "616",
            "provider_name" => "HBO Max Free",
            "display_priority" => 30,
            "logo_path" => "\/rIvQ4zuxvVirsNNVarYmOTunBD2.jpg"
        ],
        [
            "provider_id" => "406",
            "provider_name" => "HGTV",
            "display_priority" => 145,
            "logo_path" => "\/bwTpY8DTKUjoi6YfuiMenahGrTj.jpg"
        ],
        [
            "provider_id" => "281",
            "provider_name" => "Hallmark Movies",
            "display_priority" => 93,
            "logo_path" => "\/llEJ6av9kAniTQUR9hF9mhVbzlB.jpg"
        ],
        [
            "provider_id" => "290",
            "provider_name" => "Hallmark Movies Now Amazon Channel",
            "display_priority" => 100,
            "logo_path" => "\/6L2wLiZz3IG2X4MRbdRlGLgftMK.jpg"
        ],
        [
            "provider_id" => "417",
            "provider_name" => "Here TV",
            "display_priority" => 157,
            "logo_path" => "\/sa10pK4Jwr5aA7rvafFP2zyLFjh.jpg"
        ],
        [
            "provider_id" => "503",
            "provider_name" => "Hi-YAH",
            "display_priority" => 171,
            "logo_path" => "\/mB2eDIncwSAlyl8WAtfV24qEIkk.jpg"
        ],
        [
            "provider_id" => "430",
            "provider_name" => "HiDive",
            "display_priority" => 107,
            "logo_path" => "\/9baY98ZKyDaNArp1H9fAWqiR3Zi.jpg"
        ],
        [
            "provider_id" => "155",
            "provider_name" => "History",
            "display_priority" => 65,
            "logo_path" => "\/m6pLJ0l6MQJiKg1yxEs1holRSiq.jpg"
        ],
        [
            "provider_id" => "268",
            "provider_name" => "History Vault",
            "display_priority" => 83,
            "logo_path" => "\/3bm7P1O8WRqK6CYqfffJv4fba2p.jpg"
        ],
        [
            "provider_id" => "315",
            "provider_name" => "Hoichoi",
            "display_priority" => 21,
            "logo_path" => "\/d4vHcXY9rwnr763wQns2XJThclt.jpg"
        ],
        [
            "provider_id" => "212",
            "provider_name" => "Hoopla",
            "display_priority" => 39,
            "logo_path" => "\/aJ0b9BLU1Cvv5hIz9fEhKKc1x1D.jpg"
        ],
        [
            "provider_id" => "267",
            "provider_name" => "Hopster TV",
            "display_priority" => 91,
            "logo_path" => "\/gYC72bT1nz4NvOFe7pPuCsNdKch.jpg"
        ],
        [
            "provider_id" => "15",
            "provider_name" => "Hulu",
            "display_priority" => 6,
            "logo_path" => "\/zxrVdFjIjLqkfnwyghnfywTn3Lh.jpg"
        ],
        [
            "provider_id" => "368",
            "provider_name" => "IndieFlix",
            "display_priority" => 142,
            "logo_path" => "\/2NRn6OApVKfDTKLuHDRN8UadLRw.jpg"
        ],
        [
            "provider_id" => "408",
            "provider_name" => "Investigation Discovery",
            "display_priority" => 147,
            "logo_path" => "\/gMV6YwrWO9YpLiUQ5dAxnxJiWWj.jpg"
        ],
        [
            "provider_id" => "191",
            "provider_name" => "Kanopy",
            "display_priority" => 50,
            "logo_path" => "\/wbCleYwRFpUtWcNi7BLP3E1f6VI.jpg"
        ],
        [
            "provider_id" => "640",
            "provider_name" => "Kino Now",
            "display_priority" => 197,
            "logo_path" => "\/ttxbDVmHMuNTKcSLOyIHFs7TdRh.jpg"
        ],
        [
            "provider_id" => "1793",
            "provider_name" => "Klassiki",
            "display_priority" => 220,
            "logo_path" => "\/fXGdolQR7QlHgdx2hPCxoVQG8eP.jpg"
        ],
        [
            "provider_id" => "464",
            "provider_name" => "Kocowa",
            "display_priority" => 13,
            "logo_path" => "\/xfAAOAERZCnPB5jW5lhboAcXk8L.jpg"
        ],
        [
            "provider_id" => "575",
            "provider_name" => "KoreaOnDemand",
            "display_priority" => 22,
            "logo_path" => "\/uHv6Y4YSsr4cj7q4cBbAg7WXKEI.jpg"
        ],
        [
            "provider_id" => "275",
            "provider_name" => "Laugh Out Loud",
            "display_priority" => 92,
            "logo_path" => "\/w4GTJ1EDrgJku49XKSnRag9kKCT.jpg"
        ],
        [
            "provider_id" => "157",
            "provider_name" => "Lifetime",
            "display_priority" => 68,
            "logo_path" => "\/3wJNOOCbvqi7fJAdgf1QpL7Wwe2.jpg"
        ],
        [
            "provider_id" => "284",
            "provider_name" => "Lifetime Movie Club",
            "display_priority" => 95,
            "logo_path" => "\/p1v0UKH13xQsMjumRgCGmCdlgKm.jpg"
        ],
        [
            "provider_id" => "420",
            "provider_name" => "Logo TV",
            "display_priority" => 159,
            "logo_path" => "\/eWm07gxivsHwDx8CZRzVQIfVO4h.jpg"
        ],
        [
            "provider_id" => "34",
            "provider_name" => "MGM Plus",
            "display_priority" => 63,
            "logo_path" => "\/6A1gRIJqLfFHOoTvbTxDAbuU2nQ.jpg"
        ],
        [
            "provider_id" => "583",
            "provider_name" => "MGM Plus Amazon Channel",
            "display_priority" => 24,
            "logo_path" => "\/hoqk74y8HTJTMWcVes1ZVwohCue.jpg"
        ],
        [
            "provider_id" => "636",
            "provider_name" => "MGM Plus Roku Premium Channel",
            "display_priority" => 35,
            "logo_path" => "\/3sE2JNYZJRD9Le1P8B6oVEqarad.jpg"
        ],
        [
            "provider_id" => "453",
            "provider_name" => "MTV",
            "display_priority" => 111,
            "logo_path" => "\/ttCYMg3dbKYeGCgCxzsNvT3L4qF.jpg"
        ],
        [
            "provider_id" => "11",
            "provider_name" => "MUBI",
            "display_priority" => 3,
            "logo_path" => "\/bVR4Z1LCHY7gidXAJF5pMa4QrDS.jpg"
        ],
        [
            "provider_id" => "201",
            "provider_name" => "MUBI Amazon Channel",
            "display_priority" => 122,
            "logo_path" => "\/aJUiN18NZFbpSkHZQV1C1cTpz8H.jpg"
        ],
        [
            "provider_id" => "291",
            "provider_name" => "MZ Choice Amazon Channel",
            "display_priority" => 103,
            "logo_path" => "\/72tiOIjZQPqm7MGhqoqyjyTJzSv.jpg"
        ],
        [
            "provider_id" => "551",
            "provider_name" => "Magellan TV",
            "display_priority" => 15,
            "logo_path" => "\/gekkP93StjYdiMAInViVmrnldNY.jpg"
        ],
        [
            "provider_id" => "259",
            "provider_name" => "Magnolia Selects",
            "display_priority" => 87,
            "logo_path" => "\/foT1TtL67MgEOWR6Cib8dKyCvJI.jpg"
        ],
        [
            "provider_id" => "1899",
            "provider_name" => "Max",
            "display_priority" => 7,
            "logo_path" => "\/6Q3ZYUNA9Hsgj6iWnVsw2gR5V6z.jpg"
        ],
        [
            "provider_id" => "1825",
            "provider_name" => "Max Amazon Channel",
            "display_priority" => 8,
            "logo_path" => "\/7TVfqxyWGqaJZM715IPHTwtgcXo.jpg"
        ],
        [
            "provider_id" => "585",
            "provider_name" => "Metrograph",
            "display_priority" => 194,
            "logo_path" => "\/8PmpsrVDLJ3m8I37W6UNFEymhm7.jpg"
        ],
        [
            "provider_id" => "427",
            "provider_name" => "Mhz Choice",
            "display_priority" => 118,
            "logo_path" => "\/vuS4VlY50SJVHbCU3vGxQehcsAg.jpg"
        ],
        [
            "provider_id" => "68",
            "provider_name" => "Microsoft Store",
            "display_priority" => 52,
            "logo_path" => "\/shq88b09gTBYC4hA7K7MUL8Q4zP.jpg"
        ],
        [
            "provider_id" => "410",
            "provider_name" => "Motor Trend",
            "display_priority" => 153,
            "logo_path" => "\/st6VcNMu18MKbiTFhaWnxU9rBat.jpg"
        ],
        [
            "provider_id" => "562",
            "provider_name" => "MovieSaints",
            "display_priority" => 184,
            "logo_path" => "\/fdWE8jpmQqkZrwg2ZMuCLz6ms5P.jpg"
        ],
        [
            "provider_id" => "264",
            "provider_name" => "MyOutdoorTV",
            "display_priority" => 86,
            "logo_path" => "\/tTLB4xkjrKXxdtiWTeeS6qQB1v9.jpg"
        ],
        [
            "provider_id" => "79",
            "provider_name" => "NBC",
            "display_priority" => 62,
            "logo_path" => "\/wSAxtofaArEuTOsqBmghVuJx7eP.jpg"
        ],
        [
            "provider_id" => "8",
            "provider_name" => "Netflix",
            "display_priority" => 5,
            "logo_path" => "\/t2yyOv40HZeVlLjYsCsPHnWLk4W.jpg"
        ],
        [
            "provider_id" => "175",
            "provider_name" => "Netflix Kids",
            "display_priority" => 8,
            "logo_path" => "\/j2OLGxyy0gKbPVI0DYFI2hJxP6y.jpg"
        ],
        [
            "provider_id" => "1796",
            "provider_name" => "Netflix basic with Ads",
            "display_priority" => 222,
            "logo_path" => "\/mShqQVDhHoK7VUbfYG3Un6xE8Mv.jpg"
        ],
        [
            "provider_id" => "261",
            "provider_name" => "Nickhits Amazon Channel",
            "display_priority" => 84,
            "logo_path" => "\/oMwjMgYiT2jcR7ELqCH3TPzpgTX.jpg"
        ],
        [
            "provider_id" => "455",
            "provider_name" => "Night Flight Plus",
            "display_priority" => 110,
            "logo_path" => "\/ba8l0e5CkpVnrdFgzBySP7ckZnZ.jpg"
        ],
        [
            "provider_id" => "262",
            "provider_name" => "Noggin Amazon Channel",
            "display_priority" => 89,
            "logo_path" => "\/yxBUPUBFzHE72uFXvFr1l0fnMJA.jpg"
        ],
        [
            "provider_id" => "433",
            "provider_name" => "OVID",
            "display_priority" => 117,
            "logo_path" => "\/nXi2nRDPMNivJyFOifEa2t15Xuu.jpg"
        ],
        [
            "provider_id" => "487",
            "provider_name" => "OXYGEN",
            "display_priority" => 170,
            "logo_path" => "\/lrZQdxtEHMbDZDnDo92KBkEHxSl.jpg"
        ],
        [
            "provider_id" => "209",
            "provider_name" => "PBS",
            "display_priority" => 46,
            "logo_path" => "\/bbxgdl6B5T75wJE713BiTCIBXyS.jpg"
        ],
        [
            "provider_id" => "293",
            "provider_name" => "PBS Kids Amazon Channel",
            "display_priority" => 97,
            "logo_path" => "\/tU4tamrqRjbg3Lbmkryp3EiLPQJ.jpg"
        ],
        [
            "provider_id" => "294",
            "provider_name" => "PBS Masterpiece Amazon Channel",
            "display_priority" => 101,
            "logo_path" => "\/mMALQK52OFGoYUKOSCZILZkfGWs.jpg"
        ],
        [
            "provider_id" => "177",
            "provider_name" => "Pantaflix",
            "display_priority" => 48,
            "logo_path" => "\/2tAjxjo1n3H7fsXqMsxWFMeFUWp.jpg"
        ],
        [
            "provider_id" => "247",
            "provider_name" => "Pantaya",
            "display_priority" => 79,
            "logo_path" => "\/94IdHexespnJs96kmGiJlflfiwU.jpg"
        ],
        [
            "provider_id" => "292",
            "provider_name" => "Pantaya Amazon Channel",
            "display_priority" => 99,
            "logo_path" => "\/fvSJ17mOt3MxKfnSgQVrtXTuepq.jpg"
        ],
        [
            "provider_id" => "418",
            "provider_name" => "Paramount Network",
            "display_priority" => 156,
            "logo_path" => "\/hG3NOo8CJJTq7CQMj44kLFHoWOi.jpg"
        ],
        [
            "provider_id" => "531",
            "provider_name" => "Paramount Plus",
            "display_priority" => 7,
            "logo_path" => "\/xbhHHa1YgtpwhC8lb1NQ3ACVcLd.jpg"
        ],
        [
            "provider_id" => "1853",
            "provider_name" => "Paramount Plus Apple TV Channel ",
            "display_priority" => 34,
            "logo_path" => "\/9pdeflA0P1b8qlkeDA1oLfyvR06.jpg"
        ],
        [
            "provider_id" => "582",
            "provider_name" => "Paramount+ Amazon Channel",
            "display_priority" => 23,
            "logo_path" => "\/3E0RkIEQrrGYazs63NMsn3XONT6.jpg"
        ],
        [
            "provider_id" => "633",
            "provider_name" => "Paramount+ Roku Premium Channel",
            "display_priority" => 31,
            "logo_path" => "\/qlVSrZgfXlFw0Jj6hsYq2zi70JD.jpg"
        ],
        [
            "provider_id" => "1770",
            "provider_name" => "Paramount+ Showtime",
            "display_priority" => 213,
            "logo_path" => "\/vfUoancVnPRAxj8iBqhllanF0Eq.jpg"
        ],
        [
            "provider_id" => "386",
            "provider_name" => "Peacock",
            "display_priority" => 10,
            "logo_path" => "\/8VCV78prwd9QzZnEm0ReO6bERDa.jpg"
        ],
        [
            "provider_id" => "387",
            "provider_name" => "Peacock Premium",
            "display_priority" => 11,
            "logo_path" => "\/xTHltMrZPAJFLQ6qyCBjAnXSmZt.jpg"
        ],
        [
            "provider_id" => "538",
            "provider_name" => "Plex",
            "display_priority" => 177,
            "logo_path" => "\/wDWvnupneMbY6RhBTHQC9zU0SCX.jpg"
        ],
        [
            "provider_id" => "300",
            "provider_name" => "Pluto TV",
            "display_priority" => 24,
            "logo_path" => "\/t6N57S17sdXRXmZDAkaGP0NHNG0.jpg"
        ],
        [
            "provider_id" => "241",
            "provider_name" => "Popcornflix",
            "display_priority" => 74,
            "logo_path" => "\/olvOut34aWUFf1YoOqiqtjidiTK.jpg"
        ],
        [
            "provider_id" => "1832",
            "provider_name" => "Popflick",
            "display_priority" => 230,
            "logo_path" => "\/wbKHI2d5417yAAY7QestC3qnXyo.jpg"
        ],
        [
            "provider_id" => "638",
            "provider_name" => "Public Domain Movies",
            "display_priority" => 7,
            "logo_path" => "\/liEIj6CkvojVDiMWeexGvflSPZT.jpg"
        ],
        [
            "provider_id" => "278",
            "provider_name" => "Pure Flix",
            "display_priority" => 94,
            "logo_path" => "\/orsVBNvPWxJNOVSEHMOk2h8R1wA.jpg"
        ],
        [
            "provider_id" => "344",
            "provider_name" => "Rakuten Viki",
            "display_priority" => 23,
            "logo_path" => "\/qjtOUIUnk4kRpcZmaddjqDHM0dR.jpg"
        ],
        [
            "provider_id" => "279",
            "provider_name" => "Redbox",
            "display_priority" => 53,
            "logo_path" => "\/gbyLHzl4eYP0oP9oJZ2oKbpkhND.jpg"
        ],
        [
            "provider_id" => "446",
            "provider_name" => "Retrocrush",
            "display_priority" => 112,
            "logo_path" => "\/9ONs8SMAXtkiyaEIKATTpbwckx8.jpg"
        ],
        [
            "provider_id" => "473",
            "provider_name" => "Revry",
            "display_priority" => 166,
            "logo_path" => "\/r1UgUKmt83FSDOIHBdRWKooZPNx.jpg"
        ],
        [
            "provider_id" => "485",
            "provider_name" => "Rooster Teeth",
            "display_priority" => 6,
            "logo_path" => "\/3MflXNopMv3EFKbVgJGoEkJEnnF.jpg"
        ],
        [
            "provider_id" => "1875",
            "provider_name" => "Runtime",
            "display_priority" => 32,
            "logo_path" => "\/nvCfpn94VKJN4ZpkDgoupJWlXqq.jpg"
        ],
        [
            "provider_id" => "411",
            "provider_name" => "Science Channel",
            "display_priority" => 148,
            "logo_path" => "\/3bRK8VOvIfWIhOLGGwNA67kphXC.jpg"
        ],
        [
            "provider_id" => "185",
            "provider_name" => "Screambox",
            "display_priority" => 71,
            "logo_path" => "\/c2Ey5Q3uUjZgfWWQQIdVIjVfxE4.jpg"
        ],
        [
            "provider_id" => "202",
            "provider_name" => "Screambox Amazon Channel",
            "display_priority" => 126,
            "logo_path" => "\/naqM14qSfg2q0S2zDylM5zQQ3jn.jpg"
        ],
        [
            "provider_id" => "688",
            "provider_name" => "ShortsTV Amazon Channel",
            "display_priority" => 202,
            "logo_path" => "\/m0mvKlSjn38S9w7WVNV7a7XyPIe.jpg"
        ],
        [
            "provider_id" => "439",
            "provider_name" => "Shout! Factory TV",
            "display_priority" => 115,
            "logo_path" => "\/ju3T8MFGNIoPiYpwHFpNlrYNyG7.jpg"
        ],
        [
            "provider_id" => "37",
            "provider_name" => "Showtime",
            "display_priority" => 44,
            "logo_path" => "\/4kL33LoKd99YFIaSOoOPMQOSw1A.jpg"
        ],
        [
            "provider_id" => "203",
            "provider_name" => "Showtime Amazon Channel",
            "display_priority" => 26,
            "logo_path" => "\/zoL69abPHiVC1Qzd4kM6hwLSo0j.jpg"
        ],
        [
            "provider_id" => "675",
            "provider_name" => "Showtime Apple TV Channel",
            "display_priority" => 18,
            "logo_path" => "\/xVN3LKkOtCrlFT9mavhkx8SzMwV.jpg"
        ],
        [
            "provider_id" => "632",
            "provider_name" => "Showtime Roku Premium Channel",
            "display_priority" => 30,
            "logo_path" => "\/qMf2zirM2w0sO0mdAIIoP5XnQn8.jpg"
        ],
        [
            "provider_id" => "99",
            "provider_name" => "Shudder",
            "display_priority" => 70,
            "logo_path" => "\/pheENW1BxlexXX1CKJ4GyWudyMA.jpg"
        ],
        [
            "provider_id" => "204",
            "provider_name" => "Shudder Amazon Channel",
            "display_priority" => 121,
            "logo_path" => "\/sc5pTTCFbx7GQyOst5SG4U7nkPH.jpg"
        ],
        [
            "provider_id" => "299",
            "provider_name" => "Sling TV Orange and Blue",
            "display_priority" => 105,
            "logo_path" => "\/tZ4xzOtCRHjAw7tYJphivEfDr1L.jpg"
        ],
        [
            "provider_id" => "276",
            "provider_name" => "Smithsonian Channel",
            "display_priority" => 90,
            "logo_path" => "\/UAZ2lJBWszijybQD4frqw2jxRO.jpg"
        ],
        [
            "provider_id" => "521",
            "provider_name" => "Spamflix",
            "display_priority" => 12,
            "logo_path" => "\/xN97FFkFAdY1JvHhS4zyPD4URgD.jpg"
        ],
        [
            "provider_id" => "486",
            "provider_name" => "Spectrum On Demand",
            "display_priority" => 169,
            "logo_path" => "\/1tLCqSH5xiViDxMiTVWl6DmE8hd.jpg"
        ],
        [
            "provider_id" => "43",
            "provider_name" => "Starz",
            "display_priority" => 42,
            "logo_path" => "\/eWp5LdR4p4uKL0wACBBXapDV2lB.jpg"
        ],
        [
            "provider_id" => "1794",
            "provider_name" => "Starz Amazon Channel",
            "display_priority" => 221,
            "logo_path" => "\/x36C6aseF5l4uX99Kpse9dbPwBo.jpg"
        ],
        [
            "provider_id" => "1855",
            "provider_name" => "Starz Apple TV Channel",
            "display_priority" => 17,
            "logo_path" => "\/hB24bAA8Y2ei6pbEGuCNdKUOjxI.jpg"
        ],
        [
            "provider_id" => "194",
            "provider_name" => "Starz Play Amazon Channel",
            "display_priority" => 22,
            "logo_path" => "\/x36C6aseF5l4uX99Kpse9dbPwBo.jpg"
        ],
        [
            "provider_id" => "634",
            "provider_name" => "Starz Roku Premium Channel",
            "display_priority" => 32,
            "logo_path" => "\/5OAb2w7D9C2VHa0k5PaoAYeFYFE.jpg"
        ],
        [
            "provider_id" => "309",
            "provider_name" => "Sun Nxt",
            "display_priority" => 3,
            "logo_path" => "\/uW4dPCcbXaaFTyfL5HwhuDt5akK.jpg"
        ],
        [
            "provider_id" => "143",
            "provider_name" => "Sundance Now",
            "display_priority" => 73,
            "logo_path" => "\/pZ9TSk3wlRYwiwwRxTsQJ7t2but.jpg"
        ],
        [
            "provider_id" => "205",
            "provider_name" => "Sundance Now Amazon Channel",
            "display_priority" => 127,
            "logo_path" => "\/xImSZRKRYzIMPr4COgJNsEHdd2T.jpg"
        ],
        [
            "provider_id" => "215",
            "provider_name" => "Syfy",
            "display_priority" => 66,
            "logo_path" => "\/f7iqKjWYdVoYVIvKP3nboULcrM2.jpg"
        ],
        [
            "provider_id" => "506",
            "provider_name" => "TBS",
            "display_priority" => 163,
            "logo_path" => "\/rcebVnRvZvPXauK4353Jgiu4DWI.jpg"
        ],
        [
            "provider_id" => "361",
            "provider_name" => "TCM",
            "display_priority" => 137,
            "logo_path" => "\/8TbsXATKVD4Humjzi6a8SVaSY7o.jpg"
        ],
        [
            "provider_id" => "412",
            "provider_name" => "TLC",
            "display_priority" => 144,
            "logo_path" => "\/eZK2W0v3yA2Dq7cFzifK0v9FN1b.jpg"
        ],
        [
            "provider_id" => "363",
            "provider_name" => "TNT",
            "display_priority" => 139,
            "logo_path" => "\/gJnQ40Z6T7HyY6fbmmI6qKE0zmK.jpg"
        ],
        [
            "provider_id" => "419",
            "provider_name" => "TV Land",
            "display_priority" => 158,
            "logo_path" => "\/zU4b7cGYV6kRDOI6s8dgZqUvwFI.jpg"
        ],
        [
            "provider_id" => "1771",
            "provider_name" => "Takflix",
            "display_priority" => 14,
            "logo_path" => "\/cnIHBy3uLWhHRR7VeWQhK3ZsYP0.jpg"
        ],
        [
            "provider_id" => "83",
            "provider_name" => "The CW",
            "display_priority" => 38,
            "logo_path" => "\/6Y6w3F5mYoRHCcNAG0ZD2AndLJ2.jpg"
        ],
        [
            "provider_id" => "470",
            "provider_name" => "The Film Detective",
            "display_priority" => 119,
            "logo_path" => "\/rOwEnT8oDSTZ5rDKmyaa3O4gUnc.jpg"
        ],
        [
            "provider_id" => "555",
            "provider_name" => "The Oprah Winfrey Network",
            "display_priority" => 183,
            "logo_path" => "\/jbcfM4YaulkzcPRIpiPZWIfcA67.jpg"
        ],
        [
            "provider_id" => "207",
            "provider_name" => "The Roku Channel",
            "display_priority" => 29,
            "logo_path" => "\/z0h7mBHwm5KfMB2MKeoQDD2ngEZ.jpg"
        ],
        [
            "provider_id" => "454",
            "provider_name" => "Topic",
            "display_priority" => 109,
            "logo_path" => "\/ubWucXFn34TrVlJBaJFgPaC4tOP.jpg"
        ],
        [
            "provider_id" => "413",
            "provider_name" => "Travel Channel",
            "display_priority" => 154,
            "logo_path" => "\/7pkbHGkSYh6MKMTojJ80bT0KtPY.jpg"
        ],
        [
            "provider_id" => "567",
            "provider_name" => "True Story",
            "display_priority" => 19,
            "logo_path" => "\/osREemsc9uUB2J8VTkQeAVk2fu9.jpg"
        ],
        [
            "provider_id" => "73",
            "provider_name" => "Tubi TV",
            "display_priority" => 49,
            "logo_path" => "\/w2TDH9TRI7pltf5LjN3vXzs7QbN.jpg"
        ],
        [
            "provider_id" => "322",
            "provider_name" => "USA Network",
            "display_priority" => 130,
            "logo_path" => "\/ldU2RCgdvkcSEBWWbttCpVO450z.jpg"
        ],
        [
            "provider_id" => "251",
            "provider_name" => "Urban Movie Channel",
            "display_priority" => 81,
            "logo_path" => "\/5uTsmZnDQmIOjZPEv8TNTy7GRJB.jpg"
        ],
        [
            "provider_id" => "422",
            "provider_name" => "VH1",
            "display_priority" => 160,
            "logo_path" => "\/jJUUb3clz84u347JWx7RUFMdjwP.jpg"
        ],
        [
            "provider_id" => "457",
            "provider_name" => "VIX ",
            "display_priority" => 11,
            "logo_path" => "\/58aUMVWJRolhWpi4aJCkGHwfKdg.jpg"
        ],
        [
            "provider_id" => "332",
            "provider_name" => "VUDU Free",
            "display_priority" => 43,
            "logo_path" => "\/xzfVRl1CgJPYa9dOoyVI3TDSQo2.jpg"
        ],
        [
            "provider_id" => "76",
            "provider_name" => "Viaplay",
            "display_priority" => 233,
            "logo_path" => "\/cvl65OJnz14LUlC3yGK1KHj8UYs.jpg"
        ],
        [
            "provider_id" => "458",
            "provider_name" => "Vice TV ",
            "display_priority" => 120,
            "logo_path" => "\/oYpUb0xkRfEE5iccELlumPGubt4.jpg"
        ],
        [
            "provider_id" => "295",
            "provider_name" => "Viewster Amazon Channel",
            "display_priority" => 102,
            "logo_path" => "\/mlH42JbZMrapSF6zc8iTYURcZlH.jpg"
        ],
        [
            "provider_id" => "7",
            "provider_name" => "Vudu",
            "display_priority" => 41,
            "logo_path" => "\/21dEscfO8n1tL35k4DANixhffsR.jpg"
        ],
        [
            "provider_id" => "546",
            "provider_name" => "WOW Presents Plus",
            "display_priority" => 14,
            "logo_path" => "\/mgD0T960hnYU4gBxbPPBrcDfgWg.jpg"
        ],
        [
            "provider_id" => "260",
            "provider_name" => "WWE Network",
            "display_priority" => 88,
            "logo_path" => "\/rDYZ9v3Y09fuFyan51tHKE1mFId.jpg"
        ],
        [
            "provider_id" => "509",
            "provider_name" => "WeTV",
            "display_priority" => 174,
            "logo_path" => "\/qiwHTuSh91SgVMtY9lP7y5tH6kN.jpg"
        ],
        [
            "provider_id" => "192",
            "provider_name" => "YouTube",
            "display_priority" => 14,
            "logo_path" => "\/oIkQkEkwfmcG7IGpRR1NB8frZZM.jpg"
        ],
        [
            "provider_id" => "235",
            "provider_name" => "YouTube Free",
            "display_priority" => 37,
            "logo_path" => "\/4SCmZgf7AeJLKKRPcbf5VFkGpBj.jpg"
        ],
        [
            "provider_id" => "188",
            "provider_name" => "YouTube Premium",
            "display_priority" => 36,
            "logo_path" => "\/6IPjvnYl6WWkIwN158qBFXCr2Ne.jpg"
        ],
        [
            "provider_id" => "255",
            "provider_name" => "Yupp TV",
            "display_priority" => 84,
            "logo_path" => "\/8qNJcPBHZ4qewHrDJ7C7s2DBQ3V.jpg"
        ],
        [
            "provider_id" => "532",
            "provider_name" => "aha",
            "display_priority" => 11,
            "logo_path" => "\/m3NWxxR23l1w1e156fyTuw931gx.jpg"
        ],
        [
            "provider_id" => "257",
            "provider_name" => "fuboTV",
            "display_priority" => 5,
            "logo_path" => "\/jPXksae158ukMLFhhlNvzsvaEyt.jpg"
        ],
        [
            "provider_id" => "581",
            "provider_name" => "iQIYI",
            "display_priority" => 24,
            "logo_path" => "\/8MXYXzZGoPAEQU13GWk1GVvKNUS.jpg"
        ],
        [
            "provider_id" => "14",
            "provider_name" => "realeyz",
            "display_priority" => 69,
            "logo_path" => "\/10BQc1kYmgjXFrFKb3xsRcDDn14.jpg"
        ],
        [
            "provider_id" => "507",
            "provider_name" => "tru TV",
            "display_priority" => 172,
            "logo_path" => "\/pg4bIFyUsSIhFChqOz5Up1BxuIU.jpg"
        ]
    ];

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $wanted_genres = [];
        $unwanted_genres = [];
        $wanted_watch_providers = [];

        for ($i = 0; $i < rand(1, 4); $i++) {
            shuffle($this->genres);
            $wanted_genres[] = array_pop($this->genres);
        }

        for ($i = 0; $i < rand(1, 4); $i++) {
            shuffle($this->genres);
            $unwanted_genres[] = array_pop($this->genres);
        }

        for ($i = 0; $i < rand(4, 10); $i++) {
            $wanted_watch_providers[] = array_pop($this->providers);
        }

        return [
            'name' => fake()->name(),
            'email' => 'test@test.com',
            'age' => rand(15, 100),
            'country' => CountryEnum::cases()[array_rand(CountryEnum::cases())]->value,
            'gender' => 'Non Renseigné',
            'password' => 'MyPassword1!',
            'description' => rand(1, 100) <= 50 ? fake()->paragraphs(rand(1, 5), true) : null,
            'wanted_genres' => $wanted_genres,
            'unwanted_genres' => $unwanted_genres,
            'wanted_watch_providers' => $wanted_watch_providers,
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
