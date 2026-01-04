async function askAI(){
  const q=document.getElementById('aiInput').value;
  const res=await fetch('api/ai.php',{
    method:'POST',
    headers:{'Content-Type':'application/json'},
    body:JSON.stringify({query:q})
  });
  const d=await res.json();
  document.getElementById('aiResponse').innerText=d.choices[0].message.content;
}