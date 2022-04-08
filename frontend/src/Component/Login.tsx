import { useState } from "react"
import { Buffer } from "buffer"

export default function Login() {
  const [mail, setMail] = useState("")
  const [password, setPassword] = useState("")

  const handleSubmit = () => {
    const credentials = Buffer.from(mail + ":" + password).toString("base64")

    const headers = new Headers({
      "Authorization": `Basic ${credentials}`,
      "Content-type": "application/x-www-form-urlencoded"
    })

    const body = new URLSearchParams({
      action: "login"
    })

    fetch("http://localhost:2345", {
      method: "POST",
      headers: headers,
      body: body,
      mode: "cors",
      credentials: "include"
    })
      .then(response => response.json())
      .then(data => {
        console.log(data)
      })
      .catch(error => console.log("Authorization failed : " + error.message))
  }

  return (
    <div className="search-box">
      <form>
        <input
          type="text"
          className="search-bar"
          placeholder="Mail"
          value={mail}
          onChange={e => setMail(e.target.value)}
          required
        ></input>
        <input
          type="text"
          className="search-bar"
          placeholder="Password"
          value={password}
          onChange={e => setPassword(e.target.value)}
          required
        ></input>
        <input
          type="button"
          value="Envoyer"
          className="submitButton"
          onClick={handleSubmit}
        />
      </form>
      <h3>Super fonctionnalité, refresh sa page après sa connexion.</h3>
      <h3>Indice:</h3>
      <h4>Email: martin@sionfamily.com</h4>
      <h4>Mdp: domino</h4>
    </div>
  )
}
