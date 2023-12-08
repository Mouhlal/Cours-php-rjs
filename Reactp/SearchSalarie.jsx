import { useState } from "react"
import { useSelector } from "react-redux"
import { selectAllSalaries } from "./salarie_reducer"


const SearchSalarie = () => {

    const [searchMatricule,setSearchMatricule] = useState("")
    const [data,setData] = useState(null)
    const salaries = useSelector(selectAllSalaries)
    
    function searchbtn(){
        const filtredSalaries = salaries.filter(salarie => salarie.matricule === searchMatricule)
        setData(filtredSalaries[0])
    }


    return (
        <div>
            Taper Matricule:  
            <input type="text"  value={searchMatricule} onChange={(e)=>{setSearchMatricule(e.target.value)}}/>
            <button onClick={searchbtn}>Afficher</button>
            <br />{data && 
            <div>
                Matricule : {data.matricule} <br />
                Nom Complet : {data.nom}<br />
                Service : {data.service}<br />
                Salaire : {data.salaire}<br />
                Date Affectation : {data.dateAffectation}
            </div>
            }
        </div>
    )

}


export default SearchSalarie