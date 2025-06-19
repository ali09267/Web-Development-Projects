import { useState } from "react";

function Quiz(){
    const questionArray=[
        {
            q:"q1",
      mcq: "What is the capital of Pakistan?",
      options: ["Karachi", "Lahore", "Islamabad", "Peshawar"],
      answer: "Islamabad"
    },
    {
        q:"q2",
      mcq: "What is the national game of Pakistan?",
      options: ["Hockey", "Cricket", "Football", "Badminton"],
      answer: "Hockey"
    },{
        q:"q3",
  mcq: "What is the national dress of Pakistan?",
  options: ["Pant-shirt", "Shalwar Kameez", "Saree", "Sherwani"],
  answer: "Shalwar Kameez"
},
{
    q:"q4",
  mcq: "Who is the first nuclear power Muslim country of the world?",
  options: ["Saudia Arabia", "Turkey", "Iran", "Pakistan"],
  answer: "Pakistan"
},
{
    q:"q5",
  mcq: "Which is the smallest media content of the following?",
  options: ["Movies", "Comedy Sitcoms", "Ads", "Music Videos"],
  answer: "Ads"
},
{
    q:"q6",
  mcq: "What is the synonym of the word 'adorable'?",
  options: ["angry", "cute", "Dreadful", "Ugly"],
  answer: "cute"
},
{
    q:"q7",
  mcq: "What is the synonym of the word 'abhorrent'?",
  options: ["disgusting", "bitter", "Dreadful", "sweet"],
  answer: "disgusting"
}
,
{
    q:"q8",
  mcq: "Which of the following is the largest mountain of the world",
  options: ["K2", "Mount Averest", "Matterhorn", "Denali"],
  answer: "Mount Averest"
}
,
{
    q:"q9",
  mcq: "Past participle of word 'anger'",
  options: ["angerest", "most anger", "angered", "angerd"],
  answer: "angered"
}
,
{
    q:"q10",
  mcq: "Present Perfect tense of the sentence 'She had finished her homework before her friends arrived'",
  options: ["She is finishing her homework before her friends are arriving.", "She will have finished her homework before her friends arrive.", "She was finishing her homework before her friends arrived", "She has finished her homework before her friends have arrived"],
  answer: "She has finished her homework before her friends have arrived"
}
    ];

    const [index,setIndex]=useState(0);//for question to show
    const [answers, setAnswers] = useState({});//which option user select
    const [submitted,setSubmitted]=useState(false);//when user click submit button
    const [score,setScore]=useState(0);//for tracking user score

      const currentQ=questionArray[index];//optional

    const handleNext = () => {
      setIndex(index + 1);//proceed to new mcq
  };

  const handlePrev=()=>{
    setIndex(index-1);//go back to prev mcq
  }

    return(

<div className="questions-container">
    
        <h1>Quiz</h1>

      {!submitted?(

        <>
        <p>{questionArray[index].mcq}</p>

 {currentQ.options.map((opt, idx) => (
        <label key={idx}>
          <input
            type="radio"
            name={currentQ.q}
            value={opt}
            checked={answers[currentQ.q] === opt}
            onChange={(e) => {
              const newAnswer={...answers,[currentQ.q]:e.target.value};

              setAnswers(newAnswer);

                 if (currentQ.answer === e.target.value) {
      if (answers[currentQ.q] !== currentQ.answer){
        setScore((prevScore)=>prevScore+1);
      } }
       else {
    
    if (answers[currentQ.q] === currentQ.answer) {
      setScore((prevScore) => prevScore - 1);
    }}
  }
}               
          />
          {opt}
          <br />
        </label>
      ))}

      <div className="button-container">
<button className="prev" onClick={handlePrev} disabled={index === 0}>
        Prev
      </button>

<button className="next" onClick={handleNext} disabled={index === questionArray.length - 1}>
        Next
      </button>

      <button className="submit" onClick={
        ()=>setSubmitted(true)
      } 
      disabled={index !== questionArray.length - 1}>
        Submit
      </button>
      </div>
      </>
      ):(
      <p>Your score: {score}/{questionArray.length}</p>
    
    )}</div>
  );}
export default Quiz;
