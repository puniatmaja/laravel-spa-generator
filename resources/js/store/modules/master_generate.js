import axios from 'axios'

export default{
    namespaced: true,
    state:{
        master_generates: [],
        master_generate: {
            id: '',
            name: '',        
            field:[],
        },
        master_generate_errors:{
            name: '',        
            field:[],
        },
        notif:{
            message:'',
            queue: false,
            type: '',
        }
    },
    mutations: {
        clearMasterGenerate(state) {
            state.master_generate.id = ''
            state.master_generate.name = ''
            state.master_generate.field = []

            state.master_generate_errors = {
                name: '',
                field:[],            
            }
        },
        setMasterGenerateErrors(state,payload){        
            state.master_generate_errors = {
                name: '',
                field:[],                
            }
        
            if (payload.name) {
                state.master_generate_errors.name = payload.name[0]
            }

            if (payload.field) {
                state.master_generate_errors.field = payload.field[0]
            }
        },
        setNotif(state,payload){
            state.notif = payload
        }
    },
    actions: {            
        async addMasterGenerate({commit}, payload){        
            await axios.post(`/generate`, payload)
            .then(res => {
                commit('setNotif', {
                    message: `Success Add Master Generate`,
                    type: 'is-success',
                    queue: false
                })
                commit('clearMasterGenerate')
            }).catch(err => {                
                if(err.response.status == 422) {
                    commit('setNotif', {
                        message: `Checkup Your Data Again!`,
                        type: 'is-success',
                        queue: false
                    })
                }else if(err.response.status == 400){
                    commit('setMasterGenerateErrors',err.response.data)
                    commit('setNotif', {
                        message: `Checkup Your Data Again!`,
                        type: 'is-danger',
                        queue: false
                    })
                }
            })
        },
    }
}