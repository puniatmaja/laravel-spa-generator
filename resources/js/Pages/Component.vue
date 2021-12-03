<template>
<Head title="Component" />

<BreezeAuthenticatedLayout>
    <template #header>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Component
        </h2>
    </template>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex pb-5">
                <div class="w-1/3">
                    <div class="relative">
                        <i class="absolute top-4 right-4">
                            <SearchIcon class="h-4 w-4" />

                        </i>
                        <input type="text" class="input h-12" placeholder="Search">
                    </div>
                </div>
                <div class="flex-grow">
                </div>
                <div class="flex">

                    <a href="#" class="btn-primary font-bold relative" @click="tampil = true">
                        <div class="inline-flex">
                            <span class="mt-0.5">
                                Add New Product
                            </span>
                            <PlusIcon class="bg-purple-400 rounded-2xl p-1 w-6 ml-2" />

                        </div>
                    </a>
                </div>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex flex-col">
                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">

                                <!-- Table -->
                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Name
                                            </th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Title
                                            </th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Status
                                            </th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Role
                                            </th>
                                            <th scope="col" class="relative px-6 py-3">
                                                <span class="sr-only">Edit</span>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <div class="flex-shrink-0 h-10 w-10">
                                                        <img class="h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=4&w=256&h=256&q=60" alt="">
                                                    </div>
                                                    <div class="ml-4">
                                                        <div class="text-sm font-medium text-gray-900">
                                                            Jane Cooper
                                                        </div>
                                                        <div class="text-sm text-gray-500">
                                                            jane.cooper@example.com
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm text-gray-900">Regional Paradigm Technician</div>
                                                <div class="text-sm text-gray-500">Optimization</div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                    Active
                                                </span>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                Admin
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                <a href="#" class="text-indigo-600 hover:text-indigo-900 mr-2">
                                                    <div class="inline-flex">
                                                        <PencilAltIcon class="h-4 w-4 m-auto mr-0.5" aria-hidden="true" />
                                                        <span>Edit</span>
                                                    </div>
                                                </a>

                                                <a href="#" class="text-red-600 hover:text-red-900">
                                                    <div class="inline-flex" @click="tampil = true">
                                                        <TrashIcon class="h-4 w-4 m-auto mr-0.5" aria-hidden="true" />
                                                        <span>Delete</span>
                                                    </div>
                                                </a>
                                            </td>
                                        </tr>

                                        <!-- More people... -->
                                    </tbody>
                                </table>
                                <!-- Paging -->
                                <div class="bg-white px-4 py-3 flex items-center justify-between border-t border-gray-200 sm:px-6">
                                    <div class="flex-1 flex justify-between sm:hidden">
                                        <a href="#" class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                                            Previous
                                        </a>
                                        <a href="#" class="ml-3 relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                                            Next
                                        </a>
                                    </div>
                                    <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
                                        <div>
                                            <p class="text-sm text-gray-700">
                                                Showing
                                                <span class="font-medium">1</span>
                                                to
                                                <span class="font-medium">10</span>
                                                of
                                                <span class="font-medium">97</span>
                                                results
                                            </p>
                                        </div>
                                        <div>
                                            <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px" aria-label="Pagination">
                                                <a href="#" class="relative inline-flex items-center px-2 py-2 rounded-l-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                                                    <span class="sr-only">Previous</span>
                                                    <!-- Heroicon name: solid/chevron-left -->
                                                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                        <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                                                    </svg>
                                                </a>
                                                <!-- Current: "z-10 bg-indigo-50 border-indigo-500 text-indigo-600", Default: "bg-white border-gray-300 text-gray-500 hover:bg-gray-50" -->
                                                <a href="#" aria-current="page" class="z-10 bg-indigo-50 border-indigo-500 text-indigo-600 relative inline-flex items-center px-4 py-2 border text-sm font-medium">
                                                    1
                                                </a>
                                                <a href="#" class="bg-white border-gray-300 text-gray-500 hover:bg-gray-50 relative inline-flex items-center px-4 py-2 border text-sm font-medium">
                                                    2
                                                </a>
                                                <a href="#" class="bg-white border-gray-300 text-gray-500 hover:bg-gray-50 hidden md:inline-flex relative items-center px-4 py-2 border text-sm font-medium">
                                                    3
                                                </a>
                                                <span class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700">
                                                    ...
                                                </span>
                                                <a href="#" class="bg-white border-gray-300 text-gray-500 hover:bg-gray-50 hidden md:inline-flex relative items-center px-4 py-2 border text-sm font-medium">
                                                    8
                                                </a>
                                                <a href="#" class="bg-white border-gray-300 text-gray-500 hover:bg-gray-50 relative inline-flex items-center px-4 py-2 border text-sm font-medium">
                                                    9
                                                </a>
                                                <a href="#" class="bg-white border-gray-300 text-gray-500 hover:bg-gray-50 relative inline-flex items-center px-4 py-2 border text-sm font-medium">
                                                    10
                                                </a>
                                                <a href="#" class="relative inline-flex items-center px-2 py-2 rounded-r-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                                                    <span class="sr-only">Next</span>
                                                    <!-- Heroicon name: solid/chevron-right -->
                                                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                                    </svg>
                                                </a>
                                            </nav>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="py-2">
                <button type="button" class="btn-primary font-bold relative mr-1" @click="tampil = true" disabled>
                    <div class="inline-flex">
                        primary
                        <Loading />
                    </div>
                </button>
                <button type="button" class="btn-secondary mr-1" @click="tampil = true">
                    secondary
                </button>
                <button type="button" class="btn-warning mr-1" @click="tampil = true">
                    warning
                </button>
                <button type="button" class="btn-danger mr-1" @click="tampil = true">
                    danger
                </button>
                <button type="button" class="btn-success mr-1" @click="tampil = true">
                    success
                </button>
                <button type="button" class="btn-info mr-1" @click="tampil = true">
                    info
                </button>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="grid grid-cols-8 gap-6 mb-5">
                        <div class="col-span-5">
                            <label for="field" class="block text-sm font-medium text-gray-700">Field</label>
                            <input type="text" name="field" id="field" class="input">
                        </div>
                        <div class="col-span-5">
                            <label for="field" class="block text-sm font-medium text-gray-700">Field</label>
                            <textarea type="text" name="field" id="field" class="input" />
                            </div>
                        <div class="col-span-5">
                            <fieldset>
                                <legend class="text-base font-medium text-gray-900">By Email</legend>
                                <div class="mt-4 space-y-4">
                                <div class="flex items-start">
                                    <div class="flex items-center h-5">
                                    <input id="comments" name="comments" type="checkbox" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded" />
                                    </div>
                                    <div class="ml-3 text-sm">
                                    <label for="comments" class="font-medium text-gray-700">Comments</label>
                                    <p class="text-gray-500">Get notified when someones posts a comment on a posting.</p>
                                    </div>
                                </div>
                                <div class="flex items-start">
                                    <div class="flex items-center h-5">
                                    <input id="candidates" name="candidates" type="checkbox" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded" />
                                    </div>
                                    <div class="ml-3 text-sm">
                                    <label for="candidates" class="font-medium text-gray-700">Candidates</label>
                                    <p class="text-gray-500">Get notified when a candidate applies for a job.</p>
                                    </div>
                                </div>
                                <div class="flex items-start">
                                    <div class="flex items-center h-5">
                                    <input id="offers" name="offers" type="checkbox" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded" />
                                    </div>
                                    <div class="ml-3 text-sm">
                                    <label for="offers" class="font-medium text-gray-700">Offers</label>
                                    <p class="text-gray-500">Get notified when a candidate accepts or rejects an offer.</p>
                                    </div>
                                </div>
                                </div>
                            </fieldset>
                            <fieldset>
                                <div>
                                <legend class="text-base font-medium text-gray-900">Push Notifications</legend>
                                <p class="text-sm text-gray-500">These are delivered via SMS to your mobile phone.</p>
                                </div>
                                <div class="mt-4 space-y-4">
                                <div class="flex items-center">
                                    <input id="push-everything" name="push-notifications" type="radio" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300" />
                                    <label for="push-everything" class="ml-3 block text-sm font-medium text-gray-700">
                                    Everything
                                    </label>
                                </div>
                                <div class="flex items-center">
                                    <input id="push-email" name="push-notifications" type="radio" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300" />
                                    <label for="push-email" class="ml-3 block text-sm font-medium text-gray-700">
                                    Same as email
                                    </label>
                                </div>
                                <div class="flex items-center">
                                    <input id="push-nothing" name="push-notifications" type="radio" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300" />
                                    <label for="push-nothing" class="ml-3 block text-sm font-medium text-gray-700">
                                    No push notifications
                                    </label>
                                </div>
                                </div>
                            </fieldset>
                        </div>
                        <div class="col-span-5">
                            <label for="country" class="block text-sm font-medium text-gray-700">Country / Region</label>
                            <select id="country" name="country" autocomplete="country" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <option>United States</option>
                                <option>Canada</option>
                                <option>Mexico</option>
                            </select>
                        </div>
                        <div class="col-span-5">
                             <Switch
                                v-model="enabled"
                                :class="enabled ? 'bg-purple-700' : 'bg-gray-400'"
                                class="relative inline-flex items-center h-6 rounded-full w-11"
                            >
                                <span class="sr-only">Enable notifications</span>
                                <span
                                :class="enabled ? 'translate-x-6' : 'translate-x-1'"
                                class="inline-block w-4 h-4 transform bg-white rounded-full transition duration-200 ease-in-out"
                                />
                            </Switch>
                        </div>
                        <div class="col-span-5">
                             <Disclosure as="div" class="border rounded-2xl" v-slot="{ open }">
                                <DisclosureButton
                                class="flex justify-between w-full px-4 py-2 text-sm font-medium text-left text-purple-900 bg-purple-100 rounded-lg hover:bg-purple-200 focus:outline-none focus-visible:ring focus-visible:ring-purple-500 focus-visible:ring-opacity-75"
                                >
                                <span>What is your refund policy?</span>
                                <ChevronUpIcon
                                    :class="open ? 'transform rotate-180' : ''"
                                    class="w-5 h-5 text-purple-500 transition duration-200 ease-in-out"
                                />
                                </DisclosureButton>
                                <DisclosurePanel class="px-4 pt-4 pb-2 text-sm text-gray-500">
                                If you're unhappy with your purchase for any reason, email us within
                                90 days and we'll refund you in full, no questions asked.
                                </DisclosurePanel>
                            </Disclosure>
                            <Disclosure as="div" class="border rounded-2xl mt-2" v-slot="{ open }">
                                <DisclosureButton
                                class="flex justify-between w-full px-4 py-2 text-sm font-medium text-left text-purple-900 bg-purple-100 rounded-lg hover:bg-purple-200 focus:outline-none focus-visible:ring focus-visible:ring-purple-500 focus-visible:ring-opacity-75"
                                >
                                <span>Do you offer technical support?</span>
                                <ChevronUpIcon
                                    :class="open ? 'transform rotate-180' : ''"
                                    class="w-5 h-5 text-purple-500 transition duration-200 ease-in-out"
                                />
                                </DisclosureButton>
                                <DisclosurePanel class="px-4 pt-4 pb-2 text-sm text-gray-500">
                                No.
                                </DisclosurePanel>
                            </Disclosure>
                        </div>
                        <div class="col-span-5">
                            <Listbox as="div" v-model="selected">
                                <ListboxLabel class="block text-sm font-medium text-gray-700">
                                Assigned to
                                </ListboxLabel>
                                <div class="mt-1 relative">
                                <ListboxButton class="relative w-full bg-white border border-gray-300 rounded-md shadow-sm pl-3 pr-10 py-2 text-left cursor-default focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    <span class="flex items-center">
                                    <!-- <img :src="selected.avatar" alt="" class="flex-shrink-0 h-6 w-6 rounded-full" /> -->
                                    <span class="ml-3 block truncate">{{ selected.name }}</span>
                                    </span>
                                    <span class="ml-3 absolute inset-y-0 right-0 flex items-center pr-2 pointer-events-none">
                                    <SelectorIcon class="h-5 w-5 text-gray-400" aria-hidden="true" />
                                    </span>
                                </ListboxButton>

                                <transition leave-active-class="transition ease-in duration-100" leave-from-class="opacity-100" leave-to-class="opacity-0">
                                    <ListboxOptions class="absolute z-10 mt-1 w-full bg-white shadow-lg max-h-56 rounded-md py-1 text-base ring-1 ring-black ring-opacity-5 overflow-auto focus:outline-none sm:text-sm">
                                    <ListboxOption as="template" v-for="person in people" :key="person.id" :value="person" v-slot="{ active, selected }">
                                        <li :class="[active ? 'text-white bg-indigo-600' : 'text-gray-900', 'cursor-default select-none relative py-2 pl-3 pr-9']">
                                        <div class="flex items-center">
                                            <!-- <img :src="person.avatar" alt="" class="flex-shrink-0 h-6 w-6 rounded-full" /> -->
                                            <span :class="[selected ? 'font-semibold' : 'font-normal', 'ml-3 block truncate']">
                                            {{ person.name }}
                                            </span>
                                        </div>

                                        <span v-if="selected" :class="[active ? 'text-white' : 'text-indigo-600', 'absolute inset-y-0 right-0 flex items-center pr-4']">
                                            <CheckIcon class="h-5 w-5" aria-hidden="true" />
                                        </span>
                                        </li>
                                    </ListboxOption>
                                    </ListboxOptions>
                                </transition>
                                </div>
                            </Listbox>
                        </div>
                        <div class="col-span-5">
                            <TabGroup>
                                <TabList>
                                    <Tab><button type="button" class="btn-primary mr-2">Tab 1</button></Tab>
                                    <Tab><button type="button" class="btn-primary mr-2">Tab 2</button></Tab>
                                    <Tab><button type="button" class="btn-primary mr-2">Tab 3</button></Tab>
                                </TabList>
                                <TabPanels>
                                    <TabPanel>Content 1</TabPanel>
                                    <TabPanel>Content 2</TabPanel>
                                    <TabPanel>Content 3</TabPanel>
                                </TabPanels>
                            </TabGroup>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <TransitionRoot as="template" :show="tampil">
            <Dialog as="div" class="fixed z-10 inset-0 overflow-y-auto" @close="tampil = false">
                <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                    <TransitionChild as="template" enter="ease-out duration-300" enter-from="opacity-0" enter-to="opacity-100" leave="ease-in duration-200" leave-from="opacity-100" leave-to="opacity-0">
                        <DialogOverlay class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" />
                    </TransitionChild>

                    <!-- This element is to trick the browser into centering the modal contents. -->
                    <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
                    <TransitionChild as="template" enter="ease-out duration-300" enter-from="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" enter-to="opacity-100 translate-y-0 sm:scale-100" leave="ease-in duration-200" leave-from="opacity-100 translate-y-0 sm:scale-100" leave-to="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95">
                        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                                <div class="sm:flex sm:items-start">
                                    <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                                        <TrashIcon class="h-6 w-6 text-red-600" aria-hidden="true" />
                                    </div>
                                    <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                        <DialogTitle as="h3" class="text-lg leading-6 font-medium text-gray-900">
                                            Deactivate account
                                        </DialogTitle>
                                        <div class="mt-2">
                                            <p class="text-sm text-gray-500">
                                                Are you sure you want to deactivate your account? All of your data will be permanently removed. This action cannot be undone.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                                <button @click="tampil = false" type="button" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">
                                    Deactivate
                                </button>
                                <button @click="tampil = false" type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm" ref="cancelButtonRef">
                                    Cancel
                                </button>
                            </div>
                        </div>
                    </TransitionChild>
                </div>
            </Dialog>
        </TransitionRoot>

    </div>
</BreezeAuthenticatedLayout>
</template>

<script>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue'
import {
    Dialog,
    DialogOverlay,
    DialogTitle,
    TransitionChild,
    TransitionRoot,

    Listbox,
    ListboxButton,
    ListboxLabel,
    ListboxOption,
    ListboxOptions,

    Switch,

    Disclosure,
    DisclosureButton,
    DisclosurePanel,

    TabGroup,
    TabList,
    Tab,
    TabPanels,
    TabPanel
} from '@headlessui/vue'

import {
    TrashIcon,
    SearchIcon,
    PencilAltIcon,
    PlusIcon,

    CheckIcon,
    SelectorIcon,

    ChevronUpIcon,
} from '@heroicons/vue/outline'
import {
    Head,

} from '@inertiajs/inertia-vue3';
import Loading from '@/Components/Loading.vue'
export default {
    components: {
        BreezeAuthenticatedLayout,
        Head,
        Dialog,
        DialogOverlay,
        DialogTitle,
        TransitionChild,
        TransitionRoot,

        TrashIcon,
        SearchIcon,
        PencilAltIcon,
        PlusIcon,

        Loading,

        Listbox,
        ListboxButton,
        ListboxLabel,
        ListboxOption,
        ListboxOptions,
        CheckIcon,
        SelectorIcon,

        Switch,

        Disclosure,
        DisclosureButton,
        DisclosurePanel,
        ChevronUpIcon,

        TabGroup,
        TabList,
        Tab,
        TabPanels,
        TabPanel
    },
    created() {
        this.$notify({
                group: "notif",
                type: "success",
                title: "Danger",
                text: "Your account was registered!"
            },
            2000
        );
        this.$notify({
                group: "notif",
                type: "warning",
                title: "Danger",
                text: "Your account was registered!"
            },
            2000
        );
        this.$notify({
                group: "notif",
                type: "danger",
                title: "Danger",
                text: "Your account was registered!"
            },
            2000
        );
        this.$notify({
                group: "notif",
                type: "info",
                title: "Danger",
                text: "Your account was registered!"
            },
            2000
        );
        this.$notify({
                group: "notif",
                title: "Danger",
                text: "Your account was registered!"
            },
            2000
        );
    },
    data() {
        return {
            tampil: false,
            people: [{
                    name: 'ok',
                    id: 1
                },
                {
                    name: 'o1',
                    id: 2
                },
                {
                    name: 'o2',
                    id: 3
                },
            ],
            selected: {
                name: 'ok',
                id: 1
            },
            enabled: false
        }
    },
    methods: {

    }

}
</script>
