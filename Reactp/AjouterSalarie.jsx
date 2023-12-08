import { useState } from "react"
import { useDispatch } from "react-redux"
import { useNavigate } from "react-router-dom"


const AjouterSalarie = () =>{


    const dispatch = useDispatch()

    const [matriculeS, setMatriculeS] = useState() 
    const [nom, setNom] = useState() 
    const [service, setService] = useState() 
    const [salaire, setSalaire] = useState() 
    const [dateA, setDateA] = useState() 
    const navigate =useNavigate()

    function handleClick () {
        const action = {
            type: "MODIFIER",
            payload: {
                id: Math.random() * 55,
                matricule: matriculeS,
                nom: nom,
                service: service,
                salaire: salaire,
                dateAffectation: dateA
            }
        }

        dispatch(action)
        alert("Ajouter avec succes !")
        navigate("/")
    }


    return(
        <div>
            <form>
                Matricule :<input value={matriculeS} onChange={e => setMatriculeS(e.target.value)} type="text" />
                Nom Complet :<input value={nom} onChange={e => setNom(e.target.value)} type="text" />
                Service :<input type="text" value={service} onChange={e => setService(e.target.value)} />
                Salaire :<input type="text" value={salaire} onChange={e => setSalaire(e.target.value)} />
                Date Affectatin :<input type="text" value={dateA} onChange={e => setDateA(e.target.value)} />
                <button onClick={handleClick} type="button">Modifier</button>
            </form>
        </div>
    )

}

export default AjouterSalarie