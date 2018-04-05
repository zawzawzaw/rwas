<template>
    <div>
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
        <div class="container">
            tset
            <drop-down
                :list="dataList"
                :selected="selectedList"
                @changeSelectedValue="changeSelected"
            ></drop-down>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return {
                selectedList: -1,
                dataList: [
                    {
                        id: "86",
                        name: "CHINA (86)"
                    },
                    {
                        id: "85",
                        name: " HONG KONG (852)"
                    },
                    {
                        id: "62",
                        name: "INDONESIA (62)"
                    },
                    {
                        id: "60",
                        name: "MALAYSIA (60)"
                    },
                    {
                        id: "65",
                        name: "SINGAPORE (65)"
                    },
                    {
                        id: "88",
                        name: "TAIWAN (886)"
                    },
                    {
                        id: "66",
                        name: "THAILAND (66)"
                    },
                    {
                        id: "00",
                        name: "CANADA (00)"
                    },
                    {
                        id: "01",
                        name: "USA (01)"
                    },
                    {
                        id: "06",
                        name: "MALDIVES (06)"
                    },
                    {
                        id: "07",
                        name: "RUSSIA (07)"
                    },
                    {
                        id: "20",
                        name: "EGYPT (20)"
                    },
                    {
                        id: "21",
                        name: "ALGERIA (21)"
                    },
                    {
                        id: "23",
                        name: "MAURITIUS (23)"
                    },
                    {
                        id: "26",
                        name: "ZIMBABWE (26)"
                    },
                    {
                        id: "27",
                        name: "SOUTH AFRICA (27)"
                    },
                    {
                        id: "31",
                        name: "NETHERLANDS (31)"
                    },
                    {
                        id: "32",
                        name: "BELGIUM (32)"
                    },
                    {
                        id: "33",
                        name: "FRANCE (33)"
                    },
                    {
                        id: "34",
                        name: "SPAIN (34)"
                    },
                    {
                        id: "35",
                        name: "MALTA (35)"
                    },
                    {
                        id: "36",
                        name: "HUNGARY (36)"
                    },
                    {
                        id: "39",
                        name: "ITALY (39)"
                    },
                    {
                        id: "40",
                        name: "ROMANIA (40)"
                    },
                    {
                        id: "41",
                        name: "SWITZERLAND (41)"
                    },
                    {
                        id: "43",
                        name: "AUSTRIA (43)"
                    },
                    {
                        id: "44",
                        name: "UNITED KINGDOM (44)"
                    },
                    {
                        id: "45",
                        name: "DENMARK (45)"
                    },
                    {
                        id: "46",
                        name: "SWEDEN (46)"
                    },
                    {
                        id: "47",
                        name: "NORWAY (47)"
                    },
                    {
                        id: "48",
                        name: "POLAND (48)"
                    },
                    {
                        id: "49",
                        name: "GERMANY (49)"
                    },
                    {
                        id: "50",
                        name: "HONDURAS (50)"
                    },
                    {
                        id: "51",
                        name: "PORTUGAL (51)"
                    },
                    {
                        id: "52",
                        name: "MEXICO (52)"
                    },
                    {
                        id: "53",
                        name: "MACAU SPECIAL ADMINISTRATIVE REGION (53)"
                    },
                    {
                        id: "54",
                        name: "ARGENTINA (54)"
                    },
                    {
                        id: "55",
                        name: "BRAZIL (55)"
                    },
                    {
                        id: "56",
                        name: "CHILE (56)"
                    },
                    {
                        id: "58",
                        name: "FINLAND (58)"
                    },
                    {
                        id: "61",
                        name: "AUSTRALIA (61)"
                    },
                    {
                        id: "63",
                        name: "PHILIPPINES (63)"
                    },
                    {
                        id: "64",
                        name: "NEW ZEALAND (64)"
                    },
                    {
                        id: "66",
                        name: "THAILAND (66)"
                    },
                    {
                        id: "67",
                        name: "BRUNEI (67)"
                    },
                    {
                        id: "72",
                        name: "IRELAND (72)"
                    },
                    {
                        id: "75",
                        name: "PAPUA N. GUINEA (75)"
                    },
                    {
                        id: "78",
                        name: "PUERTO RICO (78)"
                    },
                    {
                        id: "80",
                        name: "KOREA (80)"
                    },
                    {
                        id: "81",
                        name: "JAPAN (81)"
                    },
                    {
                        id: "84",
                        name: "VIETNAM (84)"
                    },
                    {
                        id: "89",
                        name: "BANGLADESH (89)"
                    },
                    {
                        id: "90",
                        name: "NAURU (90)"
                    },
                    {
                        id: "91",
                        name: "INDIA (91)"
                    },
                    {
                        id: "92",
                        name: "PAKISTAN (92)"
                    },
                    {
                        id: "94",
                        name: "SRI LANKA (94)"
                    },
                    {
                        id: "95",
                        name: "MYANMAR (95)"
                    },
                    {
                        id: "96",
                        name: "SAUDI ARABIA AND KUWAIT (96)"
                    },
                    {
                        id: "97",
                        name: "UAE (97)"
                    },
                    {
                        id: "98",
                        name: "IRAN (98)"
                    },
                    {
                        id: "85",
                        name: "CAMBODIA (855)"
                    }
                ]
            }
        },
        methods: {
            changeSelected: function(val) {
                this.selectedList = val;
            }
        }
    }
</script>