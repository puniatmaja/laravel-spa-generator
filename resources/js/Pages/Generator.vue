<template>
<Head title="Generator" />

<BreezeAuthenticatedLayout>
    <template #header>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Generator
        </h2>
    </template>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form @submit="submit">
                        <div class="grid grid-cols-10 gap-6 mb-5">
                            <div class="col-span-10 sm:col-span-8">
                                <label for="first-name" class="block text-sm font-medium text-gray-700">Table Name</label>
                                <input required v-model="master_generate.name" type="text" name="first-name" id="first-name" autocomplete="given-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            </div>
                        </div>
                        <div class="grid grid-cols-10 gap-6 mb-5" v-for="(value,index) in field" :key="index+'row'">
                            <div class="col-span-10 sm:col-span-3 lg:col-span-3">
                            </div>
                            <div class="col-span-10 sm:col-span-2 lg:col-span-2">
                                <label for="city" class="block text-sm font-medium text-gray-700">Name</label>
                                <input required v-model="value.name" type="text" name="city" id="city" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            </div>
                            <div class="col-span-10 sm:col-span-2 lg:col-span-2">
                                <label for="state" class="block text-sm font-medium text-gray-700">Type</label>
                                <select v-model="value.type" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                    <option v-for="(values,indexs) in type" :value="values.name" :key="indexs">{{values.name}}</option>
                                </select>
                            </div>
                            <div class="col-span-10 sm:col-span-2 lg:col-span-2">
                                <label for="state" class="block text-sm font-medium text-gray-700">Length</label>
                                <input required v-model="value.length" type="number" name="state" id="state" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            </div>
                            <div class="col-span-10 sm:col-span-1 lg:col-span-1 justify-self-end">
                                <button @click="removeField(index)" type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 mt-5">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <div class="grid grid-cols-10 gap-6 mb-5">
                            <div class="col-span-10 sm:col-span-9 lg:col-span-9">
                            </div>
                            <div class="col-span-10 sm:col-span-3 lg:col-span-1 justify-self-end">
                                <button @click="addField()" type="button" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                                    </svg>
                                </button>
                            </div>

                        </div>
                        <div class="grid grid-cols-10 gap-6 mb-5">
                            <div class="col-span-10 sm:col-span-9 lg:col-span-8">
                            </div>
                            <div class="col-span-10 sm:col-span-3 lg:col-span-2 justify-self-end">
                                <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-purple-600 hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500">
                                    Generate
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</BreezeAuthenticatedLayout>
</template>

<script>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue'
import {
    Head
} from '@inertiajs/inertia-vue3';
import {
    mapActions,
    mapState,
    mapGetters,
    mapMutations
} from 'vuex'

export default {
    components: {
        BreezeAuthenticatedLayout,
        Head,
    },
    computed: {
        ...mapState('master_generate', {
            master_generates: state => state.master_generates,
            master_generate: state => state.master_generate,
            notif: state => state.notif,
            total: state => state.total,
            master_generate_errors: state => state.master_generate_errors,
        }),
    },
    created() {
        this.addField()
    },
    data() {
        return {
            isLoading: false,
            field: [],
            type: [{
                    name: 'integer'
                },
                {
                    name: 'string'
                },
                {
                    name: 'text'
                },
                {
                    name: 'tinyInteger'
                },
                {
                    name: 'boolean'
                },
                {
                    name: 'date'
                },
                {
                    name: 'dateTime'
                },
                {
                    name: 'char'
                },
                {
                    name: 'ipAddress'
                },
                {
                    name: 'json'
                },
                {
                    name: 'longText'
                },
                {
                    name: 'macAddress'
                },
                {
                    name: 'time'
                },
                {
                    name: 'timestamp'
                },
            ],

            isLoading: false,
        }
    },
    methods: {
        ...mapActions('master_generate', ['addMasterGenerate']),
        ...mapMutations('master_generate', ['clearMasterGenerate']),
        addField() {
            this.field.push({
                name: '',
                type: null,
                length: 100,
            })
        },
        removeField(index) {
            this.field.splice(index, 1)
        },
        submit(e) {
            e.preventDefault();
            this.isLoading = true
            this.master_generate.field = this.field

            this.addMasterGenerate(this.master_generate)
                .then(() => {
                    this.isLoading = false
                    this.field = []
                    this.addField()
                })
        }
    },
    watch: {
        notif(){           
            this.$notify({
                    group: "notif",
                    type: this.notif.type,
                    title: this.notif.title,
                    text: this.notif.message
                },
                3000
            );
        }
  }
}
</script>
