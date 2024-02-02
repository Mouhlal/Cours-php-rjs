import { salarieData } from "./data"

const initialState = {
    salaries: salarieData
}


const salarie_reducer = (state=initialState, action) => {
    switch (action.type){
        case "SUPPRIMER" :
            return {...state, salaries: state.salaries.filter(s => s.matricule !== action.payload)}

        case "MODIFIER" :
            const tempArray = state.salaries.filter(s => s.id !== action.payload.id)
            return {...state, salaries:[...tempArray, action.payload]}

        case "AJOUTER" :
            return {...state, salaries:[...state.salaries, action.payload]}

        default:
            return state
    }
}

export const selectAllSalaries = state => state.salaries
export default salarie_reducer 