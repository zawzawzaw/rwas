<?php

use Illuminate\Database\Seeder;
use App\Models\CabinData;

class CabinDataTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cabins = [
            [
                "cabin_code" => "BDA",
                "cabin_type" => "BDA: Balcony Deluxe Stateroom",
                "cabin_type_en" => "BDA: Balcony Deluxe Stateroom",
                "cabin_type_zh_hans" => "BDA: 豪华露台客房",
                "cabin_type_zh_hant" => "BDA: 豪華露台客房",
                "key" => "GDR:BDA",
                "ship_code" => "Genting Dream"
            ],
            [
                "cabin_code" => "BDS",
                "cabin_type" => "BDS: Balcony Deluxe Stateroom",
                "cabin_type_en" => "BDS: Balcony Deluxe Stateroom",
                "cabin_type_zh_hans" => "BDS: 豪华露台客房",
                "cabin_type_zh_hant" => "BDS: 豪華露台客房",
                "key" => "GDR:BDS",
                "ship_code" => "Genting Dream"
            ],
            [
                "cabin_code" => "BSA",
                "cabin_type" => "BSA: Balcony Stateroom",
                "cabin_type_en" => "BSA: Balcony Stateroom",
                "cabin_type_zh_hans" => "BSA: 露台客房",
                "cabin_type_zh_hant" => "BSA: 露台客房",
                "key" => "GDR:BSA",
                "ship_code" => "Genting Dream"
            ],
            [
                "cabin_code" => "BSS",
                "cabin_type" => "BSS: Balcony Stateroom",
                "cabin_type_en" => "BSS: Balcony Stateroom",
                "cabin_type_zh_hans" => "BSS: 露台客房",
                "cabin_type_zh_hant" => "BSS: 露台客房",
                "key" => "GDR:BSS",
                "ship_code" => "Genting Dream"
            ],
            [
                "cabin_code" => "ISA",
                "cabin_type" => "ISA: Interior Stateroom",
                "cabin_type_en" => "ISA: Interior Stateroom",
                "cabin_type_zh_hans" => "ISA: 内侧客房",
                "cabin_type_zh_hant" => "ISA: 內側客房",
                "key" => "GDR:ISA",
                "ship_code" => "Genting Dream"
            ],
            [
                "cabin_code" => "ISS",
                "cabin_type" => "ISS: Interior Stateroom",
                "cabin_type_en" => "ISS: Interior Stateroom",
                "cabin_type_zh_hans" => "ISS: 内侧客房",
                "cabin_type_zh_hant" => "ISS: 內側客房",
                "key" => "GDR:ISS",
                "ship_code" => "Genting Dream"
            ],
            [
                "cabin_code" => "OSA",
                "cabin_type" => "OSA: Oceanview Stateroom",
                "cabin_type_en" => "OSA: Oceanview Stateroom",
                "cabin_type_zh_hans" => "OSA: 海景客房",
                "cabin_type_zh_hant" => "OSA: 海景客房",
                "key" => "GDR:OSA",
                "ship_code" => "Genting Dream"
            ],
            [
                "cabin_code" => "OSS",
                "cabin_type" => "OSS: Oceanview Stateroom",
                "cabin_type_en" => "OSS: Oceanview Stateroom",
                "cabin_type_zh_hans" => "OSS: 海景客房",
                "cabin_type_zh_hant" => "OSS: 海景客房",
                "key" => "GDR:OSS",
                "ship_code" => "Genting Dream"
            ],
            [
                "cabin_code" => "AE",
                "cabin_type" => "AE: Superior Deluxe",
                "cabin_type_en" => "AE: Superior Deluxe",
                "cabin_type_zh_hans" => "AE: 高级豪华客房",
                "cabin_type_zh_hant" => "AE: 高級豪華客房",
                "key" => "SPC:AE",
                "ship_code" => "SPC ex Hong Kong"
            ],
            [
                "cabin_code" => "AF",
                "cabin_type" => "AF: Deluxe",
                "cabin_type_en" => "AF: Deluxe",
                "cabin_type_zh_hans" => "AF: 豪华房",
                "cabin_type_zh_hant" => "AF: 豪華房",
                "key" => "SPC:AF",
                "ship_code" => "SPC ex Hong Kong"
            ],
            [
            "cabin_code" => "CA",
            "cabin_type" => "CA: Deluxe Stateroom",
            "cabin_type_en" => "CA: Deluxe Stateroom",
            "cabin_type_zh_hans" => "CA: 豪华客房",
            "cabin_type_zh_hant" => "CA: 豪華客房",
            "key" => "SPC:CA",
            "ship_code" => "SPC ex Hong Kong"
            ],
            [
            "cabin_code" => "CB",
            "cabin_type" => "CB: Deluxe Stateroom",
            "cabin_type_en" => "CB: Deluxe Stateroom",
            "cabin_type_zh_hans" => "CB: 豪华客房",
            "cabin_type_zh_hant" => "CB: 豪華客房",
            "key" => "SPC:CB",
            "ship_code" => "SPC ex Hong Kong"
            ],
            [
            "cabin_code" => "CC",
            "cabin_type" => "CC: Deluxe Stateroom - Single Occupancy",
            "cabin_type_en" => "CC: Deluxe Stateroom - Single Occupancy",
            "cabin_type_zh_hans" => "CC: 豪华客房 - 1张单人床",
            "cabin_type_zh_hant" => "CC: 豪華客房 - 1張單人床",
            "key" => "SPC:CC",
            "ship_code" => "SPC ex Hong Kong"
            ],
            [
            "cabin_code" => "DA",
            "cabin_type" => "DA: Inside Stateroom",
            "cabin_type_en" => "DA: Inside Stateroom",
            "cabin_type_zh_hans" => "DA: 内侧客房",
            "cabin_type_zh_hant" => "DA: 內側客房",
            "key" => "SPC:DA",
            "ship_code" => "SPC ex Hong Kong"
            ],
            [
            "cabin_code" => "DB",
            "cabin_type" => "DB: Inside Stateroom",
            "cabin_type_en" => "DB: Inside Stateroom",
            "cabin_type_zh_hans" => "DB: 内侧客房",
            "cabin_type_zh_hant" => "DB: 內側客房",
            "key" => "SPC:DB",
            "ship_code" => "SPC ex Hong Kong"
            ],
            [
            "cabin_code" => "DC",
            "cabin_type" => "DC: Inside Stateroom",
            "cabin_type_en" => "DC: Inside Stateroom",
            "cabin_type_zh_hans" => "DC: 内侧客房",
            "cabin_type_zh_hant" => "DC: 內側客房",
            "key" => "SPC:DC",
            "ship_code" => "SPC ex Hong Kong"
            ],
            [
            "cabin_code" => "DD",
            "cabin_type" => "DD: Inside Stateroom",
            "cabin_type_en" => "DD: Inside Stateroom",
            "cabin_type_zh_hans" => "DD: 内侧客房",
            "cabin_type_zh_hant" => "DD: 內側客房",
            "key" => "SPC:DD",
            "ship_code" => "SPC ex Hong Kong"
            ],
            [
            "cabin_code" => "BA",
            "cabin_type" => "BA: Oceanview Stateroom with Balcony",
            "cabin_type_en" => "BA: Oceanview Stateroom with Balcony",
            "cabin_type_zh_hans" => "BA: 露台海景客房",
            "cabin_type_zh_hant" => "BA: 露台海景客房",
            "key" => "SSQ:BA",
            "ship_code" => "SSQ ex Taiwan"
            ],
            [
            "cabin_code" => "CA",
            "cabin_type" => "CA: Superior Oceanview Stateroom",
            "cabin_type_en" => "CA: Superior Oceanview Stateroom",
            "cabin_type_zh_hans" => "CA: 高级海景客房",
            "cabin_type_zh_hant" => "CA: 高級海景客房",
            "key" => "SSQ:CA",
            "ship_code" => "SSQ ex Taiwan"
            ],
            [
            "cabin_code" => "CB",
            "cabin_type" => "CB: Oceanview Stateroom",
            "cabin_type_en" => "CB: Oceanview Stateroom",
            "cabin_type_zh_hans" => "CB: 海景客房",
            "cabin_type_zh_hant" => "CB: 海景客房",
            "key" => "SSQ:CB",
            "ship_code" => "SSQ ex Taiwan"
            ],
            [
            "cabin_code" => "CC",
            "cabin_type" => "CC: Oceanview Stateroom",
            "cabin_type_en" => "CC: Oceanview Stateroom",
            "cabin_type_zh_hans" => "CC: 海景客房",
            "cabin_type_zh_hant" => "CC: 海景客房",
            "key" => "SSQ:CC",
            "ship_code" => "SSQ ex Taiwan"
            ],
            [
            "cabin_code" => "CD",
            "cabin_type" => "CD: Oceanview Stateroom",
            "cabin_type_en" => "CD: Oceanview Stateroom",
            "cabin_type_zh_hans" => "CD: 海景客房",
            "cabin_type_zh_hant" => "CD: 海景客房",
            "key" => "SSQ:CD",
            "ship_code" => "SSQ ex Taiwan"
            ],
            [
            "cabin_code" => "CF",
            "cabin_type" => "CF: Oceanview with PortHole",
            "cabin_type_en" => "CF: Oceanview with PortHole",
            "cabin_type_zh_hans" => "CF: 海景舷窗客房",
            "cabin_type_zh_hant" => "CF: 海景舷窗客房",
            "key" => "SSQ:CF",
            "ship_code" => "SSQ ex Taiwan"
            ],
            [
            "cabin_code" => "CG",
            "cabin_type" => "CG: Oceanview with PortHole",
            "cabin_type_en" => "CG: Oceanview with PortHole",
            "cabin_type_zh_hans" => "CG: 海景舷窗客房",
            "cabin_type_zh_hant" => "CG: 海景舷窗客房",
            "key" => "SSQ:CG",
            "ship_code" => "SSQ ex Taiwan"
            ],
            [
            "cabin_code" => "CH",
            "cabin_type" => "CH: Fully Obstructed View",
            "cabin_type_en" => "CH: Fully Obstructed View",
            "cabin_type_zh_hans" => "CH: 海景窗户客房(景观受阻)",
            "cabin_type_zh_hant" => "CH: 海景窗戶客房(景觀受阻)",
            "key" => "SSQ:CH",
            "ship_code" => "SSQ ex Taiwan"
            ],
            [
            "cabin_code" => "DA",
            "cabin_type" => "DA: Superior Inside Stateroom",
            "cabin_type_en" => "DA: Superior Inside Stateroom",
            "cabin_type_zh_hans" => "DA: 高级内侧客房",
            "cabin_type_zh_hant" => "DA: 高級內側客房",
            "key" => "SSQ:DA",
            "ship_code" => "SSQ ex Taiwan"
            ],
            [
            "cabin_code" => "DB",
            "cabin_type" => "DB: Inside Stateroom",
            "cabin_type_en" => "DB: Inside Stateroom",
            "cabin_type_zh_hans" => "DB: 内侧客房",
            "cabin_type_zh_hant" => "DB: 內側客房",
            "key" => "SSQ:DB",
            "ship_code" => "SSQ ex Taiwan"
            ],
            [
            "cabin_code" => "DC",
            "cabin_type" => "DC: Inside Stateroom",
            "cabin_type_en" => "DC: Inside Stateroom",
            "cabin_type_zh_hans" => "DC: 内侧客房",
            "cabin_type_zh_hant" => "DC: 內側客房",
            "key" => "SSQ:DC",
            "ship_code" => "SSQ ex Taiwan"
            ],
            [
            "cabin_code" => "DD",
            "cabin_type" => "DD: Inside Stateroom",
            "cabin_type_en" => "DD: Inside Stateroom",
            "cabin_type_zh_hans" => "DD: 内侧客房",
            "cabin_type_zh_hant" => "DD: 內側客房",
            "key" => "SSQ:DD",
            "ship_code" => "SSQ ex Taiwan"
            ],
            [
            "cabin_code" => "DE",
            "cabin_type" => "DE: Inside Stateroom",
            "cabin_type_en" => "DE: Inside Stateroom",
            "cabin_type_zh_hans" => "DE: 内侧客房",
            "cabin_type_zh_hant" => "DE: 內側客房",
            "key" => "SSQ:DE",
            "ship_code" => "SSQ ex Taiwan"
            ],
            [
            "cabin_code" => "BA",
            "cabin_type" => "BA: Deluxe Oceanview Stateroom",
            "cabin_type_en" => "BA: Deluxe Oceanview Stateroom",
            "cabin_type_zh_hans" => "BA: 豪华海景客房",
            "cabin_type_zh_hant" => "BA: 豪華海景客房",
            "key" => "SSR:BA",
            "ship_code" => "SSR ex Penang"
            ],
            [
            "cabin_code" => "BAB",
            "cabin_type" => "BAB: Deluxe Oceanview Stateroom - Obstructed View",
            "cabin_type_en" => "BAB: Deluxe Oceanview Stateroom - Obstructed View",
            "cabin_type_zh_hans" => "BAB: 豪华海景客房(景观受阻)",
            "cabin_type_zh_hant" => "BAB: 豪華海景客房(景觀受阻)",
            "key" => "SSR:BAB",
            "ship_code" => "SSR ex Penang"
            ],
            [
            "cabin_code" => "BB",
            "cabin_type" => "BB: Deluxe Oceanview Stateroom",
            "cabin_type_en" => "BB: Deluxe Oceanview Stateroom",
            "cabin_type_zh_hans" => "BB: 豪华海景客房",
            "cabin_type_zh_hant" => "BB: 豪華海景客房",
            "key" => "SSR:BB",
            "ship_code" => "SSR ex Penang"
            ],
            [
            "cabin_code" => "CA",
            "cabin_type" => "CA: Oceanview Stateroom with Window",
            "cabin_type_en" => "CA: Oceanview Stateroom with Window",
            "cabin_type_zh_hans" => "CA: 海景窗户客房",
            "cabin_type_zh_hant" => "CA: 海景窗戶客房",
            "key" => "SSR:CA",
            "ship_code" => "SSR ex Penang"
            ],
            [
            "cabin_code" => "CAB",
            "cabin_type" => "CAB: Oceanview Stateroom with Window - Obstructed View",
            "cabin_type_en" => "CAB: Oceanview Stateroom with Window - Obstructed View",
            "cabin_type_zh_hans" => "CAB: 海景窗户客房(景观受阻)",
            "cabin_type_zh_hant" => "CAB: 海景窗戶客房(景觀受阻)",
            "key" => "SSR:CAB",
            "ship_code" => "SSR ex Penang"
            ],
            [
            "cabin_code" => "CB",
            "cabin_type" => "CB: Oceanview Stateroom with Window",
            "cabin_type_en" => "CB: Oceanview Stateroom with Window",
            "cabin_type_zh_hans" => "CB: 海景窗户客房",
            "cabin_type_zh_hant" => "CB: 海景窗戶客房",
            "key" => "SSR:CB",
            "ship_code" => "SSR ex Penang"
            ],
            [
            "cabin_code" => "CC",
            "cabin_type" => "CC: Oceanview Stateroom with Window",
            "cabin_type_en" => "CC: Oceanview Stateroom with Window",
            "cabin_type_zh_hans" => "CC: 海景窗户客房",
            "cabin_type_zh_hant" => "CC: 海景窗戶客房",
            "key" => "SSR:CC",
            "ship_code" => "SSR ex Penang"
            ],
            [
            "cabin_code" => "CD",
            "cabin_type" => "CD: Oceanview Stateroom with Porthole",
            "cabin_type_en" => "CD: Oceanview Stateroom with Porthole",
            "cabin_type_zh_hans" => "CD: 海景舷窗客房",
            "cabin_type_zh_hant" => "CD: 海景舷窗客房",
            "key" => "SSR:CD",
            "ship_code" => "SSR ex Penang"
            ],
            [
            "cabin_code" => "DA",
            "cabin_type" => "DA: Inside Stateroom",
            "cabin_type_en" => "DA: Inside Stateroom",
            "cabin_type_zh_hans" => "DA: 内侧客房",
            "cabin_type_zh_hant" => "DA: 內側客房",
            "key" => "SSR:DA",
            "ship_code" => "SSR ex Penang"
            ],
            [
            "cabin_code" => "DB",
            "cabin_type" => "DB: Inside Stateroom",
            "cabin_type_en" => "DB: Inside Stateroom",
            "cabin_type_zh_hans" => "DB: 内侧客房",
            "cabin_type_zh_hant" => "DB: 內側客房",
            "key" => "SSR:DB",
            "ship_code" => "SSR ex Penang"
            ],
            [
            "cabin_code" => "DC",
            "cabin_type" => "DC: Inside Stateroom",
            "cabin_type_en" => "DC: Inside Stateroom",
            "cabin_type_zh_hans" => "DC: 内侧客房",
            "cabin_type_zh_hant" => "DC: 內側客房",
            "key" => "SSR:DC",
            "ship_code" => "SSR ex Penang"
            ],
            [
            "cabin_code" => "BA",
            "cabin_type" => "BA: O/View Stateroom wz Balcony",
            "cabin_type_en" => "BA: O/View Stateroom wz Balcony",
            "cabin_type_zh_hans" => "BA: 露台海景客房",
            "cabin_type_zh_hant" => "BA: 露台海景客房",
            "key" => "SSV:BA",
            "ship_code" => "SSV ex Nansha"
            ],
            [
            "cabin_code" => "BB",
            "cabin_type" => "BB: O/View Stateroom wz Balcony",
            "cabin_type_en" => "BB: O/View Stateroom wz Balcony",
            "cabin_type_zh_hans" => "BB: 露台海景客房",
            "cabin_type_zh_hant" => "BB: 露台海景客房",
            "key" => "SSV:BB",
            "ship_code" => "SSV ex Nansha"
            ],
            [
            "cabin_code" => "BC",
            "cabin_type" => "BC: O/View Stateroom wz Balcony",
            "cabin_type_en" => "BC: O/View Stateroom wz Balcony",
            "cabin_type_zh_hans" => "BC: 露台海景客房",
            "cabin_type_zh_hant" => "BC: 露台海景客房",
            "key" => "SSV:BC",
            "ship_code" => "SSV ex Nansha"
            ],
            [
            "cabin_code" => "CA",
            "cabin_type" => "CA: O/View Stateroom wz Window",
            "cabin_type_en" => "CA: O/View Stateroom wz Window",
            "cabin_type_zh_hans" => "CA: 窗户海景客房",
            "cabin_type_zh_hant" => "CA: 窗戶海景客房",
            "key" => "SSV:CA",
            "ship_code" => "SSV ex Nansha"
            ],
            [
            "cabin_code" => "CB",
            "cabin_type" => "CB: O/View Stateroom wz Window",
            "cabin_type_en" => "CB: O/View Stateroom wz Window",
            "cabin_type_zh_hans" => "CB: 窗户海景客房",
            "cabin_type_zh_hant" => "CB: 窗戶海景客房",
            "key" => "SSV:CB",
            "ship_code" => "SSV ex Nansha"
            ],
            [
            "cabin_code" => "CC",
            "cabin_type" => "CC: O/View Stateroom wz Window",
            "cabin_type_en" => "CC: O/View Stateroom wz Window",
            "cabin_type_zh_hans" => "CC: 窗户海景客房",
            "cabin_type_zh_hant" => "CC: 窗戶海景客房",
            "key" => "SSV:CC",
            "ship_code" => "SSV ex Nansha"
            ],
            [
            "cabin_code" => "CD",
            "cabin_type" => "CD: O/View Stateroom wz Porthole",
            "cabin_type_en" => "CD: O/View Stateroom wz Porthole",
            "cabin_type_zh_hans" => "CD: 舷窗海景客房",
            "cabin_type_zh_hant" => "CD: 舷窗海景客房",
            "key" => "SSV:CD",
            "ship_code" => "SSV ex Nansha"
            ],
            [
            "cabin_code" => "CS",
            "cabin_type" => "CS: O/View Stateroom wz Window Deluxe",
            "cabin_type_en" => "CS: O/View Stateroom wz Window Deluxe",
            "cabin_type_zh_hans" => "CS: 豪华窗户海景客房",
            "cabin_type_zh_hant" => "CS: 豪華窗戶海景客房",
            "key" => "SSV:CS",
            "ship_code" => "SSV ex Nansha"
            ],
            [
            "cabin_code" => "DA",
            "cabin_type" => "DA: Inside Stateroom",
            "cabin_type_en" => "DA: Inside Stateroom",
            "cabin_type_zh_hans" => "DA: 内侧客房",
            "cabin_type_zh_hant" => "DA: 內側客房",
            "key" => "SSV:DA",
            "ship_code" => "SSV ex Nansha"
            ],
            [
            "cabin_code" => "DB",
            "cabin_type" => "DB: Inside Stateroom",
            "cabin_type_en" => "DB: Inside Stateroom",
            "cabin_type_zh_hans" => "DB: 内侧客房",
            "cabin_type_zh_hant" => "DB: 內側客房",
            "key" => "SSV:DB",
            "ship_code" => "SSV ex Nansha"
            ],
            [
            "cabin_code" => "DC",
            "cabin_type" => "DC: Inside Stateroom",
            "cabin_type_en" => "DC: Inside Stateroom",
            "cabin_type_zh_hans" => "DC: 内侧客房",
            "cabin_type_zh_hant" => "DC: 內側客房",
            "key" => "SSV:DC",
            "ship_code" => "SSV ex Nansha"
            ],
            [
            "cabin_code" => "DD",
            "cabin_type" => "DD: Inside Stateroom",
            "cabin_type_en" => "DD: Inside Stateroom",
            "cabin_type_zh_hans" => "DD: 内侧客房",
            "cabin_type_zh_hant" => "DD: 內側客房",
            "key" => "SSV:DD",
            "ship_code" => "SSV ex Nansha"
            ],
            [
            "cabin_code" => "DS",
            "cabin_type" => "DS: Inside Stateroom Deluxe",
            "cabin_type_en" => "DS: Inside Stateroom Deluxe",
            "cabin_type_zh_hans" => "DS: 豪华内侧客房",
            "cabin_type_zh_hant" => "DS: 豪華內側客房",
            "key" => "SSV:DS",
            "ship_code" => "SSV ex Nansha"
            ],
            [
            "cabin_code" => "BA",
            "cabin_type" => "BA: Oceanview Stateroom with Balcony",
            "cabin_type_en" => "BA: Oceanview Stateroom with Balcony",
            "cabin_type_zh_hans" => "BA: 露台海景客房",
            "cabin_type_zh_hant" => "BA: 露台海景客房",
            "key" => "SXG:BA",
            "ship_code" => "SSG ex Singapore"
            ],
            [
            "cabin_code" => "CA",
            "cabin_type" => "CA: Superior Oceanview Stateroom",
            "cabin_type_en" => "CA: Superior Oceanview Stateroom",
            "cabin_type_zh_hans" => "CA: 高级海景客房",
            "cabin_type_zh_hant" => "CA: 高級海景客房",
            "key" => "SXG:CA",
            "ship_code" => "SSG ex Singapore"
            ],
            [
            "cabin_code" => "CB",
            "cabin_type" => "CB: Oceanview Stateroom with Window",
            "cabin_type_en" => "CB: Oceanview Stateroom with Window",
            "cabin_type_zh_hans" => "CB: 窗户海景客房",
            "cabin_type_zh_hant" => "CB: 窗戶海景客房",
            "key" => "SXG:CB",
            "ship_code" => "SSG ex Singapore"
            ],
            [
            "cabin_code" => "CC",
            "cabin_type" => "CC: Oceanview Stateroom Open to Jogging Track",
            "cabin_type_en" => "CC: Oceanview Stateroom Open to Jogging Track",
            "cabin_type_zh_hans" => "CC: 海景客房 (面向缓跑径)",
            "cabin_type_zh_hant" => "CC: 海景客房 (面向緩跑徑)",
            "key" => "SXG:CC",
            "ship_code" => "SSG ex Singapore"
            ],
            [
            "cabin_code" => "CD",
            "cabin_type" => "CD: Oceanview Stateroom with Window",
            "cabin_type_en" => "CD: Oceanview Stateroom with Window",
            "cabin_type_zh_hans" => "CD: 窗户海景客房",
            "cabin_type_zh_hant" => "CD: 窗戶海景客房",
            "key" => "SXG:CD",
            "ship_code" => "SSG ex Singapore"
            ],
            [
            "cabin_code" => "CE",
            "cabin_type" => "CE: Oceanview Stateroom with Porthole",
            "cabin_type_en" => "CE: Oceanview Stateroom with Porthole",
            "cabin_type_zh_hans" => "CE: 舷窗海景客房",
            "cabin_type_zh_hant" => "CE: 舷窗海景客房",
            "key" => "SXG:CE",
            "ship_code" => "SSG ex Singapore"
            ],
            [
            "cabin_code" => "CF",
            "cabin_type" => "CF: Oceanview Stateroom with Porthole",
            "cabin_type_en" => "CF: Oceanview Stateroom with Porthole",
            "cabin_type_zh_hans" => "CF: 舷窗海景客房",
            "cabin_type_zh_hant" => "CF: 舷窗海景客房",
            "key" => "SXG:CF",
            "ship_code" => "SSG ex Singapore"
            ],
            [
            "cabin_code" => "CH",
            "cabin_type" => "CH: Oceanview Stateroom with Window Obstructed View",
            "cabin_type_en" => "CH: Oceanview Stateroom with Window Obstructed View",
            "cabin_type_zh_hans" => "CH: 窗户海景客房(景观受阻)",
            "cabin_type_zh_hant" => "CH: 窗戶海景客房(景觀受阻)",
            "key" => "SXG:CH",
            "ship_code" => "SSG ex Singapore"
            ],
            [
            "cabin_code" => "DA",
            "cabin_type" => "DA: Superior Inside Stateroom",
            "cabin_type_en" => "DA: Superior Inside Stateroom",
            "cabin_type_zh_hans" => "DA: 高级内侧客房",
            "cabin_type_zh_hant" => "DA: 高級內側客房",
            "key" => "SXG:DA",
            "ship_code" => "SSG ex Singapore"
            ],
            [
            "cabin_code" => "DB",
            "cabin_type" => "DB: Inside Stateroom",
            "cabin_type_en" => "DB: Inside Stateroom",
            "cabin_type_zh_hans" => "DB: 内侧客房",
            "cabin_type_zh_hant" => "DB: 內側客房",
            "key" => "SXG:DB",
            "ship_code" => "SSG ex Singapore"
            ],
            [
            "cabin_code" => "DC",
            "cabin_type" => "DC: Inside Stateroom",
            "cabin_type_en" => "DC: Inside Stateroom",
            "cabin_type_zh_hans" => "DC: 内侧客房",
            "cabin_type_zh_hant" => "DC: 內側客房",
            "key" => "SXG:DC",
            "ship_code" => "SSG ex Singapore"
            ],
            [
            "cabin_code" => "DD",
            "cabin_type" => "DD: Inside Stateroom",
            "cabin_type_en" => "DD: Inside Stateroom",
            "cabin_type_zh_hans" => "DD: 内侧客房",
            "cabin_type_zh_hant" => "DD: 內側客房",
            "key" => "SXG:DD",
            "ship_code" => "SSG ex Singapore"
            ],
            [
            "cabin_code" => "BDA",
            "cabin_type" => "BDA: Balcony Deluxe Stateroom",
            "cabin_type_en" => "BDA: Balcony Deluxe Stateroom",
            "cabin_type_zh_hans" => "BDA: 豪华露台客房",
            "cabin_type_zh_hant" => "BDA: 豪華露台客房",
            "key" => "WDR:BDA",
            "ship_code" => "World Dream"
            ],
            [
            "cabin_code" => "BDS",
            "cabin_type" => "BDS: Balcony Deluxe Stateroom",
            "cabin_type_en" => "BDS: Balcony Deluxe Stateroom",
            "cabin_type_zh_hans" => "BDS: 豪华露台客房",
            "cabin_type_zh_hant" => "BDS: 豪華露台客房",
            "key" => "WDR:BDS",
            "ship_code" => "World Dream"
            ],
            [
            "cabin_code" => "BSA",
            "cabin_type" => "BSA: Balcony Stateroom",
            "cabin_type_en" => "BSA: Balcony Stateroom",
            "cabin_type_zh_hans" => "BSA: 露台客房",
            "cabin_type_zh_hant" => "BSA: 露台客房",
            "key" => "WDR:BSA",
            "ship_code" => "World Dream"
            ],
            [
            "cabin_code" => "BSS",
            "cabin_type" => "BSS: Balcony Stateroom",
            "cabin_type_en" => "BSS: Balcony Stateroom",
            "cabin_type_zh_hans" => "BSS: 露台客房",
            "cabin_type_zh_hant" => "BSS: 露台客房",
            "key" => "WDR:BSS",
            "ship_code" => "World Dream"
            ],
            [
            "cabin_code" => "DDS",
            "cabin_type" => "DDS: Dream Deluxe Suite",
            "cabin_type_en" => "DDS: Dream Deluxe Suite",
            "cabin_type_zh_hans" => "DDS: 星梦豪华套房",
            "cabin_type_zh_hant" => "DDS: 星夢豪華套房",
            "key" => "WDR:DDS",
            "ship_code" => "World Dream"
            ],
            [
            "cabin_code" => "DES",
            "cabin_type" => "DES: Dream Executive Suite",
            "cabin_type_en" => "DES: Dream Executive Suite",
            "cabin_type_zh_hans" => "DES: 星梦行政套房",
            "cabin_type_zh_hant" => "DES: 星夢行政套房",
            "key" => "WDR:DES",
            "ship_code" => "World Dream"
            ],
            [
            "cabin_code" => "DGP",
            "cabin_type" => "DGP: Dream Garden Penthhouse",
            "cabin_type_en" => "DGP: Dream Garden Penthhouse",
            "cabin_type_zh_hans" => "DGP: 帝庭总统套房",
            "cabin_type_zh_hant" => "DGP: 帝庭總統套房",
            "key" => "WDR:DGP",
            "ship_code" => "World Dream"
            ],
            [
            "cabin_code" => "DPS",
            "cabin_type" => "DPS: Palace Suite",
            "cabin_type_en" => "DPS: Palace Suite",
            "cabin_type_zh_hans" => "DPS: 皇宫套房",
            "cabin_type_zh_hant" => "DPS: 皇宮套房",
            "key" => "WDR:DPS",
            "ship_code" => "World Dream"
            ],
            [
            "cabin_code" => "DSA",
            "cabin_type" => "DSA: Dream Suite",
            "cabin_type_en" => "DSA: Dream Suite",
            "cabin_type_zh_hans" => "DSA: 星梦套房",
            "cabin_type_zh_hant" => "DSA: 星夢套房",
            "key" => "WDR:DSA",
            "ship_code" => "World Dream"
            ],
            [
            "cabin_code" => "DSS",
            "cabin_type" => "DSS: Dream Suite",
            "cabin_type_en" => "DSS: Dream Suite",
            "cabin_type_zh_hans" => "DSS: 星梦套房",
            "cabin_type_zh_hant" => "DSS: 星夢套房",
            "key" => "WDR:DSS",
            "ship_code" => "World Dream"
            ],
            [
            "cabin_code" => "ISA",
            "cabin_type" => "ISA: Inside Stateroom",
            "cabin_type_en" => "ISA: Inside Stateroom",
            "cabin_type_zh_hans" => "ISA: 内侧客房",
            "cabin_type_zh_hant" => "ISA: 內側客房",
            "key" => "WDR:ISA",
            "ship_code" => "World Dream"
            ],
            [
                "cabin_code" => "ISS",
                "cabin_type" => "ISS: Inside Stateroom",
                "cabin_type_en" => "ISS: Inside Stateroom",
                "cabin_type_zh_hans" => "ISS: 内侧客房",
                "cabin_type_zh_hant" => "ISS: 內側客房",
                "key" => "WDR:ISS",
                "ship_code" => "World Dream"
            ],
            [
                "cabin_code" => "OSA",
                "cabin_type" => "OSA: Oceanview Stateroom",
                "cabin_type_en" => "OSA: Oceanview Stateroom",
                "cabin_type_zh_hans" => "OSA: 海景客房",
                "cabin_type_zh_hant" => "OSA: 海景客房",
                "key" => "WDR:OSA",
                "ship_code" => "World Dream"
            ],
            [
                "cabin_code" => "OSS",
                "cabin_type" => "OSS: Oceanview Stateroom",
                "cabin_type_en" => "OSS: Oceanview Stateroom",
                "cabin_type_zh_hans" => "OSS: 海景客房",
                "cabin_type_zh_hant" => "OSS: 海景客房",
                "key" => "WDR:OSS",
                "ship_code" => "World Dream"
            ]
        ];

        foreach($cabins as $c) {
            CabinData::create($c);
        }
    }
}
