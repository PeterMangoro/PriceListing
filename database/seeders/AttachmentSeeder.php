<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AttachmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $imageProducts = array(
        //     '0c7be98332afba541f08f5ca5849bd892624acff4516446e0e84ade7552e1c28.jpeg',
        //     '0e83b8afae40d25571072c5ba4761004925773aec1eca69b30ff50ed89b1d9ec.jpeg',
        //     '2c1b669277c79957725d4adbfa1b6b1556297b2fc94e21f9aaab28e034e3e4a1.webp',
        //     '2f66c6e967a6c066bebd49b63c1c8d3d931370d3a68590362bc541aa34dfd157.jpg',
        //     '2fa5b002bce8312f509aa4f73f3e873c0656e537465a29e4d3f89765b7df7a21.jpg',
        //     '3ad04fe9dd368f19123a747d7927ccbcf839f2b6b472ab8fa61a547ac1afb7a2.webp',
        //     '3e1fd591e346d6692ced2a270b47b1e155cd98b1068a5cb60d6fa523ca8a1a0d.webp',
        //     '3efc17df871002caf7e2aabc107168bc22af13f268b70cd5ea9e0e8a8e5e3fb3.webp',
        //     '6bea1a4b9324ab1489faa2a396cd117c2180948e32eca5551d9d31fca04a05e3.webp',
        //     '6d4fd662527742ffbf7205ef192610dc7b52d5f4612e23bcea56b559d3ee1404.webp',
        //     '6d5be72093c3866c1b06186256791750c5f44b1948d7a865ae6f91b9b7a4ee01.jpg',
        //     '6df98e9dc921af0a09b34f4db6cf3e0dfa7322d7928ec6a0204aa6378f8c6840.webp',
        //     '6ecf28bda96d9a5615d053f43805b7634e19fbbdad575bfe38bce216b1da9b70.jpg',
        //     '7a370fc94706860c3428da1017284170788533f17cbc618d6e640da793d01765.jpg',
        //     '8ce6f6a53300c2065e0431235a0dee81de7f4485577eb61790aaa89f0c8f8694.webp',
        //     '8f4a0240851560d691b891eb84abc2067eba9c033a565e6ffa91651ecba8884e.jpg',
        //     '9a500f2f742de6ebe5e83d0c2e9ca0d02416414369b975836c8a4a823355fb22.webp',
        //     '11a8765aa0ae21403153de19ed88ef182c827f9aa3c5f03bbe2822081892a699.jpg',
        //     '20f0cc832013b06c7f448082f2061052db3f4b96225c4070eb7289ef8574aef7.webp',
        //     '22f18305c29a971e5d3a4bee54fbd80c714e75673337958d45e68670f4bfe853.webp',
        //     '47a63a2e12733fe38d71aa09daf797b499bb53fca1b73e4e0784c467696b6917.webp',
        //     '53cf43020f7985dff3d226f8028b6602f98df76c5800a783d5668835b2a57260.webp',
        //     '59bdbebabf1a727942988dbc63965425bc0baf0df925fe85c29ae722448dedee.jpg',
        //     '65b938e6ae68bd48d5c2bff90df945f318a13e9f274893bd97f83c5e57d49623.jpg',
        //     '80e590e2418d05a923a1101b5a9e53f6ea3ce9b3fa62a8d27847c12bf23c74e4.webp',
        //     '87d76a359276040d367b43e79fe8f4d2c38d2475f510b60accc02c55a01020a1.webp',
        //     '271bcf8bf57f5b6ad5791e6271ddc492add4d9bf7bd9c1ed709363ecb93896de.webp',
        //     '0295acafa3caab20227b5ec12bd9036955ad1518635cf37544b14706711590d4.jpg',
        //     '408d96523cb7283fe5ea45e093f88744bbc414f7b11b297d8e194617387b0a6b.jpg',
        //     '423eab4affa3ac1aed9accc329b768a0efcaf1174ba395247d525d2314a9f91a.webp',
        //     '488de6b97549bd5c9f19b35f3935d1aae04bcd9a7ea799313a903cce7c605bb3.jpg',
        //     '829cbbc78022874d3551ab97e00d7f6b9a72a83c9ffcb74eda91784efd14ce4f.webp',
        //     '2300cadc29ed5857d050374d5b4b518caf797dcbee0b3f905599ca10ae42fbf1.webp',
        //     '8224efec82dafeb9eede60b94b609d814a2eaecf4d520c793c45ab8d04e7dff0.jpg',
        //     '11151dbdc7260a35cf617a7d625d2c491a228aedfe435ef8126878d233316cde.jpg',
        //     '380484c66733a6f01857dc47b198504be0f0db717c32802a788637921ed469e9.webp',
        //     '523066c1cf38aa2513627fb30c9d37828b4e6a65fa3e3f049e4da8259af15a3a.jpg',
        //     '50954890ea7458d48bdf04f22d1b7334a6560e8f70ae2301baef5bb160129b8b.jpg',
        //     '4332481427b4933d0ffb2e7f6133cbb16e5ef4b6a46829e050acfe7463d80655.webp',
        //     'a36b8b97047ac5163c1032ccc2e97b91375033832610e529ec45b688cd241773.jpg',
        //     'a55a68e59022b55087d38cc82d3fb8e2470d423a8812402d07952f5412f4f13f.webp',
        //     'aabb6cf370f51729cf0d5a06915d5b80a5ce99e04aec6a8c73ce85970439f4f7.webp',
        //     'ab26e1183053968a32ae3289ba686a27f283d03df477b4f17f0fba0001ad9bad.webp',
        //     'b4c7a55443e096317c4cf478b6208117e3dd4dac21ad91e1ff9c91d4a540ec6f.jpg',
        //     'b959dae00a279da2bc7727d04b422f58f0f8a5708b7ce77c2301443d89385630.webp',
        //     'c18e7f5075a7d98af0b4e8a8ab9ab6ae3b9dddf016ec67e0ba7eb0f4fa4a8014.webp',
        //     'c81f4e6cf0ef60c84db152c151fef66174a1b021d664603016f867f975546761.jpg',
        //     'c176eda32907010ddedf1eb0c1e0fa1ceffef38be73565b9b5096d1a378ef419.webp',
        //     'cbdbcc13e6dbcf7e3b12139d1595c517a9fa3821a0fe0f594cdeb592cd0b8b1f.webp',
        //     'd6569bad4df6d93c318dc74453f80650d1dcd6de92ab781b10aeae11c58b4e76.webp',
        //     'db7e913a0ab7ab2c79cba99d43d6e458bf500a061d624e413388532932c0c40a.webp',
        //     'dfe4c2aa77ba0f74af422d4dc45369e31835f8bb1476e7d7f2c0fb536013e7a6.jpg',
        //     'e041b9d86546dc9a1fd438313e40bc6d22a71c71c496b363020f14c5a324230d.webp',
        //     'e170dae6d66f1a306bf4890b7ebeb758b9f8d42e48d26ee9fe0d9220a1c0dd4e.webp',
        //     'e928be686ff036a503c76563f41dc95b5ad859eee65ad61c361fbcdbc3d2b29e.webp',
        //     'eca784da18cfc1116cca806b81b3214a91e48bdf6b2eb91a5d84b1dcf7db2f2e.webp',
        //     'ee9f17ecd22fbdb3e9d5e20a03dc3b8ff2c4b76f4957c58877d06b2adae3f7ae.jpg',
        //     'f5f8f81b86828c1e6be9f7ad2290e43f481e5f132d71a9359d10c0b9a1f767e4.webp',
        //     'f98b147c845285b966b3e93c24ba41279cb00547532fc105a8e318f714d2402c.png',
        //     'fbcdf507a175ea776faa6f977291114965f3ebb49a4d988f72bc5e486b7423df.web
        // );

        // $documents = array(
        //     array(
        //         'path'=>'public/product/documents/iTtAeBZBDMq5gBGGNrsZ0lPAPPyB2iK3KSs8wH90.pdf',
        //         'mime_type'=>'application/pdf'
        //     ),
        //     array(
        //         'path'=>'public/product/documents/4KGdsTEvLtibdbSRNucMHhgYLmrgTOH1D40HKqKh.pdf',
        //         'mime_type'=>'application/pdf'
        //     ),
        //     array(
        //         'path'=>'public/product/documents/znA011NWEQyeQwhcUgFJcYK1BX9FyfzGXjmpZj6Z.pdf',
        //         'mime_type'=>'application/pdf'
        //     ),
        //     array(
        //         'path'=>'public/product/documents/zGtK6uHiYWzBPP7OWaZin7ic4e2iKRbP3ywU90PD.pdf',
        //         'mime_type'=>'application/pdf'
        //     ),
        //     array(
        //         'path'=>'public/product/documents/vYfGxw0vpgDZsbwibQUNOyaKYWXIl1uxNLBhizt5.odt',
        //         'mime_type'=>'application/vnd.oasis.opendocument.text'
        //     ),
        //     
        //     array(
        //         'path'=>'public/product/documents/KTZs3rZs2NHFn626BuS5Tp7hLADZ8dDONnpK8ZZL.txt',
        //         'mime_type'=>'text/plain'
        //     ),
        
        // );

        // for ($i = 1; $i <= 100000; $i++) {
        //     $rand = rand(0, count($documents)-1);
        //     $rand_2 = rand(0, count($documents)-1);
        //     DB::table('attachments')->insert(
        //         [
        //             [
        //                 'uuid' => Str::uuid()->toString(),
        //                 'attachmentable_id' => $i,
        //                 'attachmentable_type' => 'App\Models\Mall\Product',
        //                 'path' => "/storage/product/images/" . $imageProducts[rand(0, count($imageProducts)-1)],
        //                 'type'=>'image',
        //                 'title' => null,
        //                 'mime_type'=>null

        //             ],
        //             [
        //                 'uuid' => Str::uuid()->toString(),
        //                 'attachmentable_id' => $i,
        //                 'attachmentable_type' => 'App\Models\Mall\Product',
        //                 'path' => "/storage/product/images/" . $imageProducts[rand(0, count($imageProducts)-1)],
        //                 'type'=>'image',
        //                 'title' => null,
        //                 'mime_type'=>null

        //             ],
        //             [
        //                 'uuid' => Str::uuid()->toString(),
        //                 'attachmentable_id' => $i,
        //                 'attachmentable_type' => 'App\Models\Mall\Product',
        //                 'path' => "/storage/product/images/" . $imageProducts[rand(0, count($imageProducts)-1)],
        //                 'type'=>'image',
        //                 'title' => null,
        //                 'mime_type'=>null

        //             ],
                   
        //             [
                        
        //                 // dd($documents[$rand]['mime_type']),
                  
        //                 'uuid' => Str::uuid()->toString(),
        //                 'attachmentable_id' => $i,
        //                 'attachmentable_type' => 'App\Models\Mall\Product',
        //                 'path'=> $documents[$rand]['path'],
        //                 'mime_type'=>$documents[$rand]['mime_type'],
        //                 'type'=>'document',
        //                 'title' => fake()->words(2,true),

        //             ],

        //             [
                        
        //                 'uuid' => Str::uuid()->toString(),
        //                 'attachmentable_id' => $i,
        //                 'attachmentable_type' => 'App\Models\Mall\Product',
        //                 'path'=> $documents[$rand_2]['path'],
        //                 'mime_type'=>$documents[$rand_2]['mime_type'],
        //                 'type'=>'document',
        //                 'title' => fake()->words(2,true),

        //             ],
        //         ]
        //     );
        // };

        //Employees

//         $imageAvatars = array(
//             '6a87ef5be25811a2fe6e4e026fdab74044935d1ce7b42f5a0072409fdbc118ed.webp',
//             '6be075eb2b37bcf0d9a2c33597f0a1076686637fd6a89a6b7135ee97beb4530c.jpg',
//             '6c451a4b8d59efd1cc21bbe0a60028c1922b3368369189accbc6e9b2394d363a.png',
//             '7e09a5355d7005d17ee59e1760999ac8c31fd96a13a8d9fda6ea7459cba1be6e.webp',
//             '7ea6314b0608df8e3c36b3c249c0e878c2d9d7e0d0b735a0f074cc9756b38625.jpg',
//             '9eaca5b2d00dcdf93f1fffd0d877d9d9683deeaf110cea0cd8e0749f97e12b2b.jpeg',
//             '44ca0ee6a394ae2ff0c21298db0b4fdae3ddb949a44dc9777dc5779571cccc97.webp',
//             '62e3f146e925645eef3f678406bae54be6ae964c7fce00fe2fd6e0a4ac035fd4.jpg',
//             '874cf500336be8511936dda6d76a730652ef6ebd5af107ec2722b9548fb06abd.jpg',
//             '981d8d6f52dcc955d79fd2c872855323260dd3b7a924f8436e1e67b4cea819bd.jpg',
//             'af978e0562284939a7a94ad7fd07762f0d3d6ed471ab1e1ea67b262068e7f472.jpg',
//             'c5fcfa069bfc2c619fc6fce0afa6c53bf89cf35dd6e1a9cca53859cefd9f98b1.png',
//             'c6a388f75edb2964e7eeb58ef8a43367e5fad77bc45ed6aab7d422cd6e01f173.png',
//             'c9e748081af47920d2e0903d37985cfaa0a0bc01fb92287baf3a48d8721b2218.png',
//             'c118da9103cb0eb72f8132098b291d93611bb6bc91cac4eab3bf6a93d0f3fc5a.png',
//             'cff4a272572e907cd6e58724dfa4aca3b7723f9e907c1db0730aa40966db9fd9.webp',
//             'd19dbe2cb827b0c8fd971587fcef0c49e11bfe36a14fe5331580a78dd977851d.jpeg',
//             'da7e04d25c583109e9ad9f375c28bb79e885c7af8290c3740401ca52bb2322ef.jpeg',
// 'e89db639f6b1173a28a382748deb529e3470de26fd506d9b34c9002798e595ce.jpg',
// 'e33e455e54099e08b7bbda574d26e2acafff65c472aca5bd2c4529bc4f65b3d3.jpeg',
// 'edbf9dbd173091c830dd53dde1f16455859ef638c9a5368dadec9e7e4dc2cff4.jpg',
// 'f57d83313d5937c9d00d3ccf2fc46610d61b26a00c2efc35d4d884bea9dc9273.jpg',
// 'fc01042d0c6adcdd3909b28116655bf370767859332de8641919cfd906f182d6.jpg',


//         );
//         for ($i = 1; $i <= 132507; $i++) {
            
//             DB::table('attachments')->insert(
//                 [
//                     [
//                         'uuid' => Str::uuid()->toString(),
//                         'attachmentable_id' => $i,
//                         'attachmentable_type' => 'App\Models\Shared\Employee',
//                         'path' => "/storage/employee/images/" . $imageAvatars[rand(0, count($imageAvatars)-1)],
//                         'type'=>'image',
//                         'title' => null,
//                         'mime_type'=>null

//                     ],
                  
                   
//                 ]
//             );
//         };

        // $imageAccommodations = array(
        //     '1e595b765903a139d95872cc580bb8c4c8bc777786309e890b177ccfb468e321.jpg',
        //     '1f11c05d071a553f98b54b3718811540b4a704ec78b4d5afe4683046b3dee21f.webp',
        //     '2a17e8eeffff5d913fd3d1026eef4938784d80829f172586788912055c17dcd2.jpg',
        //     '2c6678c24394a0f858efa71459f631b37b28fa81f94ee3b7d59ce0d260164da5.jpg',
        //     '002c2732d01d0dd7e9b9e4659f46da00c3931199387c3227c39934ecd172cc64.jpg',
        //     '7ca97214c230bd9a4f55abe48f0b76debc4769457c066f79d2a4a2d96ae7544d.jpg',
        //     '8a7a895b10931c1edadb22032640752ed411a46d87bd87a45598e64151411c3f.jpg',
        //     '72dd9818e14c6f8b59fcd84bbaab026aaf5620a61b5e8ed4506a214ce77a9a15.jpg',

        //     '96a8ab3afe0dce7a41113402ce47613b72629fb349147410715cd949e00a0fbd.jpg',
        //     '690b7395043254d6666b28c692ef8e221243d5db2e96a44cefbde037445cf584.jpg',
        //     '3139a37d426221318f987907a05d9cae01b086535c5bbc7c324804dc6af3f6d5.jpeg',

        //     '5979c503b64029d884e4055df449af7cbd9217ab9d7a6d4ecce135aa81a90708.webp',
        //     '49736e58a4d9785b1ba7599e0f69b8565720fae6f3ac2b44d5c0f3a712db83c9.jpg',
        //     '95314f42df0c2b424982ab83ad92ccb9f973302781fc9e4d6a7e50686afef8b7.webp',

        //     '03697594ebd3a04e58dacc6e8f09e596c963fe66e528ee834bc0c9c44d158fba.jpg',
        //     '7403748fd880865a73c08297ffcd728bde63f27d27e3a3b2064b33c432aa24ff.jpeg',
        //     'a5f3e3839ed4bc5c559cc4ba01e8ee105b411b42f10ae9be5828a89df1129833.jpg',
        //     'a2197ed3d0f3811d23c3dd5a93047f3b0e76d0932a98d7456480718ba04d483d.jpg',
        //     'ae4f012f6d257ef13f5bc2f301b0677adfb65ea506de20310fe97e92fb1a087a.webp',
        //     'b75e354f3c74330843882fc4b6d192c03a2157d2c1929020ea5d32d37843ebaa.jpg',
        //     'b45381e592efed01393ad8548bf89f7111602458abdc47131b5e53b04f097ded.jpg',
        //     'bcc4e6f6c6f39014c98a8b2c5f7b3ac53d842d55ec4205e1233af95cd5f65528.jpeg',
        //     'c2508217fec6afa2fb6a98302d17202d45ed2d107d6fd4b0a15e9cfd224b40af.jpg',
        //     'c019d4673c01924ce4698cf471d437284f43daa1b007a251c672087d971a8703.jpg',
        //     'e72232b339fff51c4443f6a0a248cbf05f187a2d0da8d185f879beeba06a41c4.webp',
        //     'ec41787288db6aaee38f6dfe5e20ed36f2074ce126a578ca2301d40bd6ca6549.jpg',
        //     'f2ff94fb7830d5f950235e2e6f2c0b1a98c8799b95623bf5a19ac2eb691ffddd.jpg',
        //     'dd62c965ad626797f862318ec512e5d5bf55528fef2ec2e61210e5f804284309.jpg',
        //     'e3779b7e71e73599811490c38cc155ff7a0036f031096dc8840f4f4a2e8b4b5f.jpg',
        //     'e88211fa10ad6f0acc7db62e3a39258a103cbdbe282b41db7fa2e2f2f8b51dda.jpg',
        //     'e88211fa10ad6f0acc7db62e3a39258a103cbdbe282b41db7fa2e2f2f8b51dda.jpg',
        //     '03697594ebd3a04e58dacc6e8f09e596c963fe66e528ee834bc0c9c44d158fba.jpg'

        // );

        // $accommodationDocuments = array(
        //     array(
        //         'path'=>'public/accommodation/documents/iTtAeBZBDMq5gBGGNrsZ0lPAPPyB2iK3KSs8wH90.pdf',
        //         'mime_type'=>'application/pdf'
        //     ),
        //     array(
        //         'path'=>'public/accommodation/documents/4KGdsTEvLtibdbSRNucMHhgYLmrgTOH1D40HKqKh.pdf',
        //         'mime_type'=>'application/pdf'
        //     ),
        //     array(
        //         'path'=>'public/accommodation/documents/znA011NWEQyeQwhcUgFJcYK1BX9FyfzGXjmpZj6Z.pdf',
        //         'mime_type'=>'application/pdf'
        //     ),
        //     array(
        //         'path'=>'public/accommodation/documents/zGtK6uHiYWzBPP7OWaZin7ic4e2iKRbP3ywU90PD.pdf',
        //         'mime_type'=>'application/pdf'
        //     ),
        //     array(
        //         'path'=>'public/accommodation/documents/vYfGxw0vpgDZsbwibQUNOyaKYWXIl1uxNLBhizt5.odt',
        //         'mime_type'=>'application/vnd.oasis.opendocument.text'
        //     ),
            
        //     array(
        //         'path'=>'public/accommodation/documents/KTZs3rZs2NHFn626BuS5Tp7hLADZ8dDONnpK8ZZL.txt',
        //         'mime_type'=>'text/plain'
        //     ),
        
        // );

        // for ($i = 1; $i <= 100000; $i++) {
        //     $rand = rand(0, count($accommodationDocuments)-1);
        //     $rand_2 = rand(0, count($accommodationDocuments)-1);
        //     DB::table('attachments')->insert(
        //         [
        //             [
        //                 'uuid' => Str::uuid()->toString(),
        //                 'attachmentable_id' => $i,
        //                 'attachmentable_type' => 'App\Models\Mall\Accommodation',
        //                 'path' => "/storage/accommodation/images/" . $imageAccommodations[rand(0, count($imageAccommodations)-1)],
        //                 'type'=>'image',
        //                 'title' => null,
        //                 'mime_type'=>null

        //             ],
        //             [
        //                 'uuid' => Str::uuid()->toString(),
        //                 'attachmentable_id' => $i,
        //                 'attachmentable_type' => 'App\Models\Mall\Accommodation',
        //                 'path' => "/storage/accommodation/images/" . $imageAccommodations[rand(0, count($imageAccommodations)-1)],
        //                 'type'=>'image',
        //                 'title' => null,
        //                 'mime_type'=>null

        //             ],
        //             [
        //                 'uuid' => Str::uuid()->toString(),
        //                 'attachmentable_id' => $i,
        //                 'attachmentable_type' => 'App\Models\Mall\Accommodation',
        //                 'path' => "/storage/accommodation/images/" . $imageAccommodations[rand(0, count($imageAccommodations)-1)],
        //                 'type'=>'image',
        //                 'title' => null,
        //                 'mime_type'=>null

        //             ],
                   
        //             [
                        
        //                 // dd($documents[$rand]['mime_type']),
                  
        //                 'uuid' => Str::uuid()->toString(),
        //                 'attachmentable_id' => $i,
        //                 'attachmentable_type' => 'App\Models\Mall\Accommodation',
        //                 'path'=> $accommodationDocuments[$rand]['path'],
        //                 'mime_type'=>$accommodationDocuments[$rand]['mime_type'],
        //                 'type'=>'document',
        //                 'title' => fake()->words(2,true),

        //             ],

        //             [
                        
        //                 'uuid' => Str::uuid()->toString(),
        //                 'attachmentable_id' => $i,
        //                 'attachmentable_type' => 'App\Models\Mall\Accommodation',
        //                 'path'=> $accommodationDocuments[$rand_2]['path'],
        //                 'mime_type'=>$accommodationDocuments[$rand_2]['mime_type'],
        //                 'type'=>'document',
        //                 'title' => fake()->words(2,true),

        //             ],
        //             ]
        //                 );
        //             };

        $carDocuments = array(
            array(
                'path'=>'public/car/documents/iTtAeBZBDMq5gBGGNrsZ0lPAPPyB2iK3KSs8wH90.pdf',
                'mime_type'=>'application/pdf'
            ),
            array(
                'path'=>'public/car/documents/4KGdsTEvLtibdbSRNucMHhgYLmrgTOH1D40HKqKh.pdf',
                'mime_type'=>'application/pdf'
            ),
            array(
                'path'=>'public/car/documents/znA011NWEQyeQwhcUgFJcYK1BX9FyfzGXjmpZj6Z.pdf',
                'mime_type'=>'application/pdf'
            ),
            array(
                'path'=>'public/car/documents/zGtK6uHiYWzBPP7OWaZin7ic4e2iKRbP3ywU90PD.pdf',
                'mime_type'=>'application/pdf'
            ),
            array(
                'path'=>'public/car/documents/vYfGxw0vpgDZsbwibQUNOyaKYWXIl1uxNLBhizt5.odt',
                'mime_type'=>'application/vnd.oasis.opendocument.text'
            ),
            
            array(
                'path'=>'public/car/documents/KTZs3rZs2NHFn626BuS5Tp7hLADZ8dDONnpK8ZZL.txt',
                'mime_type'=>'text/plain'
            ),
        
        );

        $imageCars = array(
            '1b5cd6174ff7ad0da613a41ce1d68f8ed3cc1b71ee6deefc3fea2da7433a63d5.jpeg',
            '1b06efc3f12d16bad16d08047cd0f301f23fea48cfbb5a40babf2daf9878820d.jpg',
            '1fe52c7b8e1a8b56567bcb2275788437ff5de14b758943b0008d22d311232cd0.webp',
            '3b21fb8151cc30dd7dab8e58bc597e54a9a5d675c8228ea96506c4366ae171f3.jpg',
            '3e81e0dd90d09a6564c8785e71c5593d7549259c629e669a493777649ec8b389.jpg',
            '4a10bd6df8a5bb80e7d7ad4e903e4cccb958e329de784a29480b47f3fafb4ffc.jpg',
            '5bb9a8c35753baafc7ef7291f1113a55e504f6ea47367bab8dbfdd31ea46373b.webp',
            '7b2397cf1833ad9415226dd1ea4e6b6962b72374315a39b97cab42eeeca10cb1.jpg',
            '7bafd6de27fe35067c2c6b01b5729c9969bb777e9ec8dd2f15ee3cddad0ec99c.jpeg',

            '9a94caf9d122845e3f3af0c5a7611c15be5b689536e2995cd24709c9037d0a2a.jpg',
            '16dc8cfad4274a854afdeae0be2f6bc6a65953e7917d2bd9eed2e2f5314a96dd.jpg',
            '21a8ad97ed2e9a957c8831d28ecff4d931cafcb8139eefd0cea289fb04395b55.jpg',
            '31f118350fca22a6ecc6385fe476b1357cc482099e8668cc9730395256945d34.webp',
            '45eff2547a03410d69604524fd4dd339032de31c75f99b85388282e7a3865a08.jpeg',
            '68cfbd500e72f6d6ec1c5492d740b30e9540e58e5777755a5d296b0affa71013.jpg',
            '68f6c52dff69501d897c4cc6be17b2fdafbf750f768de19fd3d7fd4b54652907.webp',

            '312d2b68780dd4ae4444dffdbb5daa384ca882c54ba1bbc75f03f0cce8a93e70.jpg',
            '600cffa0507c9329158312991e7e2f44fb980f6afd5d21f49dd2d08136deac69.jpg',

            '1715f0fb8ac88361ab1ed4800d06413d9bb503fbba5950e565161e376cbfb3b4.webp',
            'a47d743a6e80ded93682fb9cb631d8fcfb93dbe40307acdbd2f2046d19b3dec8.webp',
            'a656a064c9c9f92c2339022de4c76d5737c9f0763143f93e9b125e0893c9ff29.webp',
            'b3adadc4f3cd953bb616961da3d0435fc56c34d7e21c092d73037ff2471ffa7f.jpg',
            'bb695f0be4c796e03ae5198c5f60a0cd143fb55a26f0f68b552910fa11e1125c.jpg',
            'be4e18b7c6b4dc00ef884f9abb416304b17e636056ed08e8245c6eb8d7e4cd02.webp',

            '67587e94f753af2498e0eb256c7ad56cb25b651d43114f0461232aa84c5eb365.jpg',
            'bb695f0be4c796e03ae5198c5f60a0cd143fb55a26f0f68b552910fa11e1125c.jpg',
            'c956cc79611c8d8e075e636976061378a0b318134139fd91e52a9e6db6cfc214.jpeg',

            'ca8ebf3c47552e47641dc4ba0ef823adf8544dd189bf81b99486bd2ea1a58c2b.jpg',            
            'db9f408d7542ecf9d11b0b2dd226dc306d7c98ffaf4db7edd71291d177e890da.png',
            'e442afe0b5ea9b50ad910d95a50e7d1e3514ac8bbccd3922520752027ebc557c.png',
            'edc56093af03ff8c2a021156d8a57fae6d3b6be18739ce6bed661dfc5c360578.webp',
            'f2e0f09a931761eb6cd95ba46521a73b0c0ee0ba5560f7d6ccaa076218ded9f2.webp',
            'f3771505fcb30a88474d79b4c0c98687c99a5edbc5d9f8eb2ebeb6aa63f6c3a7.jpg',
            'fb57c9d3a5a2fe9ad99daa4061b17420371b6363f6482c868cc5d606e3f62a64.jpg',
            'fbd9fb0487398ac8f5ae48a9e1683f3b90e1aef67f972a1b52ac150d81f47052.webp',
            'fc93611288bee1eeead23f5b9d5caeea1051eec45a8ea5abc139153403d10c97.jpeg',
            'ff9d7068bf9889fe83dfe136e0e47f7aeba6760ce9e333384006669555438ed1.jpg',
            'fbd9fb0487398ac8f5ae48a9e1683f3b90e1aef67f972a1b52ac150d81f47052.webp',
            'bb695f0be4c796e03ae5198c5f60a0cd143fb55a26f0f68b552910fa11e1125c.jpg',
            '312d2b68780dd4ae4444dffdbb5daa384ca882c54ba1bbc75f03f0cce8a93e70.jpg'
        );

       
        for ($i = 1; $i <= 100000; $i++) {
            $rand = rand(0, count($carDocuments)-1);
            $rand_2 = rand(0, count($carDocuments)-1);
            DB::table('attachments')->insert(
                [
                    [
                        'uuid' => Str::uuid()->toString(),
                        'attachmentable_id' => $i,
                        'attachmentable_type' => 'App\Models\Mall\Car',
                        'path' => "/storage/car/images/" . $imageCars[rand(0, count($imageCars)-1)],
                        'type'=>'image',
                        'title' => null,
                        'mime_type'=>null

                    ],
                    [
                        'uuid' => Str::uuid()->toString(),
                        'attachmentable_id' => $i,
                        'attachmentable_type' => 'App\Models\Mall\Car',
                        'path' => "/storage/car/images/" . $imageCars[rand(0, count($imageCars)-1)],
                        'type'=>'image',
                        'title' => null,
                        'mime_type'=>null

                    ],
                    [
                        'uuid' => Str::uuid()->toString(),
                        'attachmentable_id' => $i,
                        'attachmentable_type' => 'App\Models\Mall\Car',
                        'path' => "/storage/car/images/" . $imageCars[rand(0, count($imageCars)-1)],
                        'type'=>'image',
                        'title' => null,
                        'mime_type'=>null

                    ],
                   
                    [
                        
                        // dd($documents[$rand]['mime_type']),
                  
                        'uuid' => Str::uuid()->toString(),
                        'attachmentable_id' => $i,
                        'attachmentable_type' => 'App\Models\Mall\Car',
                        'path'=> $carDocuments[$rand]['path'],
                        'mime_type'=>$carDocuments[$rand]['mime_type'],
                        'type'=>'document',
                        'title' => fake()->words(2,true),

                    ],

                    [
                        
                        'uuid' => Str::uuid()->toString(),
                        'attachmentable_id' => $i,
                        'attachmentable_type' => 'App\Models\Mall\Car',
                        'path'=> $carDocuments[$rand_2]['path'],
                        'mime_type'=>$carDocuments[$rand_2]['mime_type'],
                        'type'=>'document',
                        'title' => fake()->words(2,true),

                    ],
                ]
            );
        };

       
        // $imageServices = array(
        //    '0c7be98332afba541f08f5ca5849bd892624acff4516446e0e84ade7552e1c28.jpeg',
        //    '0e83b8afae40d25571072c5ba4761004925773aec1eca69b30ff50ed89b1d9ec.jpeg',
        //    '5e7e23714e890dcbb0402cfd973dfe75fe1255a71b96ff7633a1bc4b1da3851d.jpg',
        //    '6eadea80386b9d54fabb28c32655386b9e1bdff2b1d402906585b7541cb80966.jpg',
        //    '7bdc938d8588d7205a5d8cc17417460a02886ca117f3a87e085cef5e26968358.jpeg',
        //    '8e59984dbc64b9733b69f7714b45d00ffc1d45f7579cdbd394a0d44622ffd687.jpeg',
        //    '9afc2f5127fec7aaba33e7329cb64441decb8c1fd06ddaeb1702ce140d9f44e1.jpeg',
        //    '9cac16acce1ea4d4f31bcbb759b3d78a827b38671861d289f5c90b7dc5212e5c.jpeg',
        //    '19d742d4e0d019becf3d6a613c961f3a6e70b31361a2656f26926e50e29fc6ef.jpeg',
        //    '20f92f1985f8dbc2dc8bd61ab572b3ec89974084e10a7820f6745759e4b5f494.jpg',
        //    '22b65321b82ba65bb74b37fe6146e75e38c7f5ad6dcb271f6417793ce8b5ac19.jpeg',
        //    '32c34168b1edd83910a9166521804a9222f9b480319ff6f0112ca1be42844132.jpg',
        //    '52fbd5e1d6a7c012b26a1f2f11e88139bf9e6d4bbce932d90ac02c2686a067d9.jpg',
        //    '58b0974826ce02cf41ed2b8927af38162f1fcac187ba5bea8c27c4c46c18b525.jpeg',
        //    '059e1e080a0cb7114f3cd4cb8ba704752265005afe26705813fcb7b5d7c3747c.jpeg',
        //    '74e6338ce3a5ac12179ef5034c7a6e9b7970c976e0458ad42e42420e28327020.jpeg',
        //    '240bf6d2e3d40af0b09733dc2fc1d98d66a6bb8b2fab1b4cb4da44f618192d08.webp',
        //    '487d5a1a9a03833fae149df329a39a262840aa8c6acb79847cceff3fdff1aa39.jpeg',
        //    '728b8ccbe1a991ed44be93110340990c86f664733af457749c3e6c627db46c8b.jpeg',
        //    '881b75a9ac3e3d0d9e156a6865c7d26e80cfb0c84f8cdba4abe63536beb45ef2.webp',
        //    '807356d3e9389d543aaae84cc27f09b39d9765bd364d9f145d4207a6af1dc6b4.png',
        //    '9348819d9c4f2ae19a1cd30a493b59d13b69a78c75916822146ee6831d46f8c3.jpeg',
        //    '41185474d73c5b516b563d71c7006fa4858c6b16a25e0aca1b79bf6d71d6cb1c.jpeg',
        //    'a7b264222ee0f988f10e2747ed096e4cdaf3aa6b6928f1c67593120b73e0049f.png',
        //    'af3c8e78f18d4bc89887059e1f355be4cbe5ed8b47a5c67f51acc9c2a894dcfc.jpg',
        //    'bb0395b6b091badb3757b0f55d26026ad7e3ed31bb1816601f5414f28cedb409.jpeg',
        //    'c9d5ece555b32150db06c57146e3f28dcc35663089c1ae087570603cd57cced7.jpg',
        //    'c34ae121ee31991e1ba8d33c59b4014a6b830acf9fc5d58bf56d9c2dead3691f.jpg',
        //    'c89a9b5613a8e70eccd008c63edd79ab089a24f994f0b098a72db9b1227d4932.jpg',
        //    'cb479bcd0c714716b37358d3bc474b7bba3f2c425adf8103738d245428220cf4.jpeg',
        //    'cc64433323cda3df59d15cdc53d91a7f2e750ffd9178d0eb328607df0f679583.jpeg',
        //    'e1de3653eb159402daa6a5406206edab4b88b35e2514ef667435aae744f7cc36.webp',
        //    'e9d9cc7c3c9a8a3cafff94c95082e3b486461cf284c29f9a1e81424bb4891b59.jpg',
        //       '5e7e23714e890dcbb0402cfd973dfe75fe1255a71b96ff7633a1bc4b1da3851d.jpg',
        //     '6eadea80386b9d54fabb28c32655386b9e1bdff2b1d402906585b7541cb80966.jpg',
        //     '20f92f1985f8dbc2dc8bd61ab572b3ec89974084e10a7820f6745759e4b5f494.jpg',
        //     '32c34168b1edd83910a9166521804a9222f9b480319ff6f0112ca1be42844132.jpg',
        //     '52fbd5e1d6a7c012b26a1f2f11e88139bf9e6d4bbce932d90ac02c2686a067d9.jpg',
        //     'c34ae121ee31991e1ba8d33c59b4014a6b830acf9fc5d58bf56d9c2dead3691f.jpg', 
        //     'c89a9b5613a8e70eccd008c63edd79ab089a24f994f0b098a72db9b1227d4932.jpg',
        //     'e9d9cc7c3c9a8a3cafff94c95082e3b486461cf284c29f9a1e81424bb4891b59.jpg',

        //     //
        //     '0c7be98332afba541f08f5ca5849bd892624acff4516446e0e84ade7552e1c28.jpeg',
        //         '0e83b8afae40d25571072c5ba4761004925773aec1eca69b30ff50ed89b1d9ec.jpeg',
        //         '2c1b669277c79957725d4adbfa1b6b1556297b2fc94e21f9aaab28e034e3e4a1.webp',
        //         '2f66c6e967a6c066bebd49b63c1c8d3d931370d3a68590362bc541aa34dfd157.jpg',
        //         '2fa5b002bce8312f509aa4f73f3e873c0656e537465a29e4d3f89765b7df7a21.jpg',
        //         '3ad04fe9dd368f19123a747d7927ccbcf839f2b6b472ab8fa61a547ac1afb7a2.webp',
        //         '3e1fd591e346d6692ced2a270b47b1e155cd98b1068a5cb60d6fa523ca8a1a0d.webp',
        //         '3efc17df871002caf7e2aabc107168bc22af13f268b70cd5ea9e0e8a8e5e3fb3.webp',
        //         '6bea1a4b9324ab1489faa2a396cd117c2180948e32eca5551d9d31fca04a05e3.webp',
        //         '6d4fd662527742ffbf7205ef192610dc7b52d5f4612e23bcea56b559d3ee1404.webp',
        //         '6d5be72093c3866c1b06186256791750c5f44b1948d7a865ae6f91b9b7a4ee01.jpg',
        //         '6df98e9dc921af0a09b34f4db6cf3e0dfa7322d7928ec6a0204aa6378f8c6840.webp',
        //         '6ecf28bda96d9a5615d053f43805b7634e19fbbdad575bfe38bce216b1da9b70.jpg',
        //         '7a370fc94706860c3428da1017284170788533f17cbc618d6e640da793d01765.jpg',
        //         '8ce6f6a53300c2065e0431235a0dee81de7f4485577eb61790aaa89f0c8f8694.webp',
        //         '8f4a0240851560d691b891eb84abc2067eba9c033a565e6ffa91651ecba8884e.jpg',
        //         '9a500f2f742de6ebe5e83d0c2e9ca0d02416414369b975836c8a4a823355fb22.webp',
        //         '11a8765aa0ae21403153de19ed88ef182c827f9aa3c5f03bbe2822081892a699.jpg',
        //         '20f0cc832013b06c7f448082f2061052db3f4b96225c4070eb7289ef8574aef7.webp',
        //         '22f18305c29a971e5d3a4bee54fbd80c714e75673337958d45e68670f4bfe853.webp',
        //         '47a63a2e12733fe38d71aa09daf797b499bb53fca1b73e4e0784c467696b6917.webp',
        //         '53cf43020f7985dff3d226f8028b6602f98df76c5800a783d5668835b2a57260.webp',
        //         '59bdbebabf1a727942988dbc63965425bc0baf0df925fe85c29ae722448dedee.jpg',
        //         '65b938e6ae68bd48d5c2bff90df945f318a13e9f274893bd97f83c5e57d49623.jpg',
        //         '80e590e2418d05a923a1101b5a9e53f6ea3ce9b3fa62a8d27847c12bf23c74e4.webp',
        //         '87d76a359276040d367b43e79fe8f4d2c38d2475f510b60accc02c55a01020a1.webp',
        //         '271bcf8bf57f5b6ad5791e6271ddc492add4d9bf7bd9c1ed709363ecb93896de.webp',
        //         '0295acafa3caab20227b5ec12bd9036955ad1518635cf37544b14706711590d4.jpg',
        //         '408d96523cb7283fe5ea45e093f88744bbc414f7b11b297d8e194617387b0a6b.jpg',
        //         '423eab4affa3ac1aed9accc329b768a0efcaf1174ba395247d525d2314a9f91a.webp',
        //         '488de6b97549bd5c9f19b35f3935d1aae04bcd9a7ea799313a903cce7c605bb3.jpg',
        //         '829cbbc78022874d3551ab97e00d7f6b9a72a83c9ffcb74eda91784efd14ce4f.webp',
        //         '2300cadc29ed5857d050374d5b4b518caf797dcbee0b3f905599ca10ae42fbf1.webp',
        //         '8224efec82dafeb9eede60b94b609d814a2eaecf4d520c793c45ab8d04e7dff0.jpg',
        //         '11151dbdc7260a35cf617a7d625d2c491a228aedfe435ef8126878d233316cde.jpg',
        //         '380484c66733a6f01857dc47b198504be0f0db717c32802a788637921ed469e9.webp',
        //         '523066c1cf38aa2513627fb30c9d37828b4e6a65fa3e3f049e4da8259af15a3a.jpg',
        //         '50954890ea7458d48bdf04f22d1b7334a6560e8f70ae2301baef5bb160129b8b.jpg',
        //         '4332481427b4933d0ffb2e7f6133cbb16e5ef4b6a46829e050acfe7463d80655.webp',
        //         'a36b8b97047ac5163c1032ccc2e97b91375033832610e529ec45b688cd241773.jpg',
        //         'a55a68e59022b55087d38cc82d3fb8e2470d423a8812402d07952f5412f4f13f.webp',
        //         'aabb6cf370f51729cf0d5a06915d5b80a5ce99e04aec6a8c73ce85970439f4f7.webp',
        //         'ab26e1183053968a32ae3289ba686a27f283d03df477b4f17f0fba0001ad9bad.webp',
        //         'b4c7a55443e096317c4cf478b6208117e3dd4dac21ad91e1ff9c91d4a540ec6f.jpg',
        //         'b959dae00a279da2bc7727d04b422f58f0f8a5708b7ce77c2301443d89385630.webp',
        //         'c18e7f5075a7d98af0b4e8a8ab9ab6ae3b9dddf016ec67e0ba7eb0f4fa4a8014.webp',
        //         'c81f4e6cf0ef60c84db152c151fef66174a1b021d664603016f867f975546761.jpg',
        //         'c176eda32907010ddedf1eb0c1e0fa1ceffef38be73565b9b5096d1a378ef419.webp',
        //         'cbdbcc13e6dbcf7e3b12139d1595c517a9fa3821a0fe0f594cdeb592cd0b8b1f.webp',
        //         'd6569bad4df6d93c318dc74453f80650d1dcd6de92ab781b10aeae11c58b4e76.webp',
        //         'db7e913a0ab7ab2c79cba99d43d6e458bf500a061d624e413388532932c0c40a.webp',
        //         'dfe4c2aa77ba0f74af422d4dc45369e31835f8bb1476e7d7f2c0fb536013e7a6.jpg',
        //         'e041b9d86546dc9a1fd438313e40bc6d22a71c71c496b363020f14c5a324230d.webp',
        //         'e170dae6d66f1a306bf4890b7ebeb758b9f8d42e48d26ee9fe0d9220a1c0dd4e.webp',
        //         'e928be686ff036a503c76563f41dc95b5ad859eee65ad61c361fbcdbc3d2b29e.webp',
        //         'eca784da18cfc1116cca806b81b3214a91e48bdf6b2eb91a5d84b1dcf7db2f2e.webp',
        //         'ee9f17ecd22fbdb3e9d5e20a03dc3b8ff2c4b76f4957c58877d06b2adae3f7ae.jpg',
        //         'f5f8f81b86828c1e6be9f7ad2290e43f481e5f132d71a9359d10c0b9a1f767e4.webp',
        //         'f98b147c845285b966b3e93c24ba41279cb00547532fc105a8e318f714d2402c.png',
        //         'fbcdf507a175ea776faa6f977291114965f3ebb49a4d988f72bc5e486b7423df.web',
            
        // );

        // $documents = array(
        //     array(
        //         'path'=>'public/service/documents/iTtAeBZBDMq5gBGGNrsZ0lPAPPyB2iK3KSs8wH90.pdf',
        //         'mime_type'=>'application/pdf'
        //     ),
        //     array(
        //         'path'=>'public/service/documents/4KGdsTEvLtibdbSRNucMHhgYLmrgTOH1D40HKqKh.pdf',
        //         'mime_type'=>'application/pdf'
        //     ),
        //     array(
        //         'path'=>'public/service/documents/znA011NWEQyeQwhcUgFJcYK1BX9FyfzGXjmpZj6Z.pdf',
        //         'mime_type'=>'application/pdf'
        //     ),
        //     array(
        //         'path'=>'public/service/documents/zGtK6uHiYWzBPP7OWaZin7ic4e2iKRbP3ywU90PD.pdf',
        //         'mime_type'=>'application/pdf'
        //     ),
        //     array(
        //         'path'=>'public/service/documents/vYfGxw0vpgDZsbwibQUNOyaKYWXIl1uxNLBhizt5.odt',
        //         'mime_type'=>'application/vnd.oasis.opendocument.text'
        //     ),
            
        //     array(
        //         'path'=>'public/service/documents/KTZs3rZs2NHFn626BuS5Tp7hLADZ8dDONnpK8ZZL.txt',
        //         'mime_type'=>'text/plain'
        //     ),
        
        // );

        // for ($i = 1; $i <= 100000; $i++) {
        //     $rand = rand(0, count($documents)-1);
        //     $rand_2 = rand(0, count($documents)-1);
        //     DB::table('attachments')->insert(
        //         [
        //             [
        //                 'uuid' => Str::uuid()->toString(),
        //                 'attachmentable_id' => $i,
        //                 'attachmentable_type' => 'App\Models\Mall\Service',
        //                 'path' => "/storage/service/images/" . $imageServices[rand(0, count($imageServices)-1)],
        //                 'type'=>'image',
        //                 'title' => null,
        //                 'mime_type'=>null

        //             ],
        //             [
        //                 'uuid' => Str::uuid()->toString(),
        //                 'attachmentable_id' => $i,
        //                 'attachmentable_type' => 'App\Models\Mall\Service',
        //                 'path' => "/storage/service/images/" . $imageServices[rand(0, count($imageServices)-1)],
        //                 'type'=>'image',
        //                 'title' => null,
        //                 'mime_type'=>null

        //             ],
        //             [
        //                 'uuid' => Str::uuid()->toString(),
        //                 'attachmentable_id' => $i,
        //                 'attachmentable_type' => 'App\Models\Mall\Service',
        //                 'path' => "/storage/service/images/" . $imageServices[rand(0, count($imageServices)-1)],
        //                 'type'=>'image',
        //                 'title' => null,
        //                 'mime_type'=>null

        //             ],
                   
        //             [
                        
        //                 // dd($documents[$rand]['mime_type']),
                  
        //                 'uuid' => Str::uuid()->toString(),
        //                 'attachmentable_id' => $i,
        //                 'attachmentable_type' => 'App\Models\Mall\Service',
        //                 'path'=> $documents[$rand]['path'],
        //                 'mime_type'=>$documents[$rand]['mime_type'],
        //                 'type'=>'document',
        //                 'title' => fake()->words(2,true),

        //             ],

        //             [
                        
        //                 'uuid' => Str::uuid()->toString(),
        //                 'attachmentable_id' => $i,
        //                 'attachmentable_type' => 'App\Models\Mall\Service',
        //                 'path'=> $documents[$rand_2]['path'],
        //                 'mime_type'=>$documents[$rand_2]['mime_type'],
        //                 'type'=>'document',
        //                 'title' => fake()->words(2,true),

        //             ],
        //         ]
        //     );
        // };

    }
}
