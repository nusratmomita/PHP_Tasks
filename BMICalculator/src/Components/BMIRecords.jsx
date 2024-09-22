import { useState,useEffect}  from "react";

const BmiRecords = () =>{
    const [BmiRecords,setBmiRecords] = useState([]);
    const [error,setError] = useState(null);

    useEffect(() =>
    {
        fetch("http://localhost/BMICalculator/fetchRecords.php",{
            method:"GET",
            credentials:"include",
        })
        .then((response) =>{
            if(!response.ok){
                throw new Error("Failed to fetch data");
            }
            return response.json();
        })
        .then((data) => {
            setBmiRecords(data);
        }) 
        .catch((error) =>{
            setError(error.message);
        });
    }, []);

    return (
        <div className="bmi_records">
            <h2>Your BMI Records</h2>
            {error && <p style={{color:"red"}}>{error}</p>}
            <ul>
                {BmiRecords.map((record,index) => (
                 <li key={index}>
                    <p>Height:{record.Height} cm</p>
                    <p>Weight:{record.Weight} kg</p>
                    <p>BMI:{record.BMI}</p>
                 </li>
                ))}
            </ul>
        </div>
    )
}

export default BmiRecords;