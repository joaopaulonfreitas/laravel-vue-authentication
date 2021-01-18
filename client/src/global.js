//import Vue from 'vue'

// Armazenar informações de usuário no localstorage
export const userKey = '_userLogin' 
export const baseUrl = 'http://localhost:8001/api'


// export function showError(e){
//     if(e && e.response && e.response.data){
//         Vue.toasted.global.defaultError({msg: e.response.data})
//     }else if(typeof e === 'string'){
//         Vue.toasted.global.defaultError({msg: e})
//     }else{
//         Vue.toasted.global.defaultError()
//     }
// }

export default {baseUrl, userKey}