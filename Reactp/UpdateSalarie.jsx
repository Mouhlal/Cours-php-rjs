import { useState } from "react"
import { useDispatch, useSelector } from "react-redux"
import { useNavigate, useNavigation, useParams } from "react-router-dom"
import { selectAllSalaries } from "./salarie_reducer"
import AfficherSalaries from "./AfficherSalaries"

const UpdateSalarie = () => {

    const  { matricule } = useParams()
    const salarie = useSelector(selectAllSalaries).filter(s => s.matricule === matricule)
    const dispatch = useDispatch()

    const [matriculeS, setMatriculeS] = useState(salarie[0].matricule) 
    const [nom, setNom] = useState(salarie[0].nom) 
    const [service, setService] = useState(salarie[0].service) 
    const [salaire, setSalaire] = useState(salarie[0].salaire) 
    const [dateA, setDateA] = useState(salarie[0].dateAffectation) 
    const navigate =useNavigate()

    function handleClick () {
        const action = {
            type: "MODIFIER",
            payload: {
                id:salarie[0].id,
                matricule: matricule,
                nom: nom,
                service: service,
                salaire: salaire,
                dateAffectation: dateA
            }
        }

        dispatch(action)
        alert("Modifier avec succes !")
        navigate("/")
    }

        return (
            <form>
                Matricule :<input value={matriculeS} onChange={e => setMatriculeS(e.target.value)} type="text" />
                Nom Complet :<input value={nom} onChange={e => setNom(e.target.value)} type="text" />
                Service :<input type="text" value={service} onChange={e => setService(e.target.value)} />
                Salaire :<input type="text" value={salaire} onChange={e => setSalaire(e.target.value)} />
                Date Affectatin :<input type="text" value={dateA} onChange={e => setDateA(e.target.value)} />
                <button onClick={handleClick} type="button">Modifier</button>
            </form>
        )
}



export default UpdateSalarie