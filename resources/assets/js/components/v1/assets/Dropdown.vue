<template>
    <div class="dropDownCon" :class="'dropDownCon'+indicator">
        <div class="dropDownContent" :class="'dropDownContent'+indicator">
            <div class="placeholder" v-on:click="toggleDropDown">{{ showPlaceholder }}</div>
            <ul class="list" v-show="open">
                <li>
                    <input type="text" v-model="keyword" class="filterKeyword"/>
                </li>
                <li v-for="(l, index) in list" v-bind:key="index" v-on:click="changeSelected(index)" v-show="keywordMatch(index)">
                    {{ l.name }}
                </li>
            </ul>
        </div>
        <div class="dropDownIndicator" :class="'dropDownIndicator'+indicator" v-on:click="toggleDropDown">
            <template v-if="open">
                <i class="material-icons">arrow_drop_up</i>
            </template>
            <template v-else>
                <i class="material-icons">arrow_drop_down</i>
            </template>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            list: {
                type: Array,
                default: []
            },
            selected: {
                type: Number,
                default: 1
            },
            parentIndex: {
                type: Number,
                default: -1
            }
        },
        data() {
            return {
                indicator: 0,
                open: false,
                keyword: ""
            }
        },
        computed: {
            showPlaceholder: function() {
                if(this.list.length===0){
                    return "Loading...";
                }
                var placeholder = this.list[0].name;
                for(var l in this.list){
                    if(this.list[l].id!==this.selected) continue;
                    placeholder = this.list[l].name;
                }
                return placeholder;
            }
        },
        methods: {
            changeSelected: function(index) {
                if(this.parentIndex===-1){
                    this.$emit('changeSelectedValue', this.list[index].id);
                }else{
                    this.$emit('changeSelectedValue', {
                        key: this.parentIndex,
                        val: this.list[index].id
                    });
                }
                this.toggleDropDown();
            },
            keywordMatch: function(index) {
                if(this.keyword==="") true;
                
                var name = this.list[index].name.toLowerCase();
                var keyword = this.keyword.toLowerCase();

                return name.match('[^,]*'+keyword+'[,$]*');
            },
            toggleDropDown: function() {
                this.open = this.open===true ? false : true;
            }
        },
        beforeMount() {
            this.indicator = Math.floor(Math.random() * ((10000-2)+1) + 2);
        },
        mounted () {
            var ths = this;
            $(document).mouseup(function (event) {
                if(ths.open==true) {
                    if(!$('.dropDownCon input').is(event.target) && !$('.dropDownCon'+ths.indicator).is(event.target) && !$('.dropDownCon .placeholder').is(event.target) && $('.dropDownIndicator'+ths.indicator).has(event.target).length===0 && !$('.dropDownCon'+ths.indicator+' .list li').is(event.target) && $('.dropDownIndicator'+ths.indicator+' .list li').has(event.target).length===0){
                        ths.toggleDropDown();
                    }
                }
            });
        }
    }
</script>

<style>
    .dropDownCon {
        width: 300px;
        background: #e2e2e2;
        border-radius: 5px;
        position: relative;
    }

    .dropDownContent {
        line-height: 25px;
        width: 100%;
        padding: 12.5px 20px;
    }

    .placeholder {
        cursor: pointer;
    }

    .filterKeyword {
        width: 100%;
        line-height: 25px;
        font-size: 14px;
        margin: 6px 0;
    }

    .dropDownIndicator {
        position: absolute;
        cursor: pointer;
        top: 12px;
        right: 5px;
    }
</style>