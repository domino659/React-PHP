import ReactReact, { useState, useEffect } from "react"
import { Buffer } from "buffer"

export default function Login() {
  const [action] = useState("login")
  const [mail, setMail] = useState("martin@sionfamily.com")
  const [password, setPassword] = useState("domino")
  const [token, changeToken] = useState("")

  const handleSubmit = () => {
    const credentials = Buffer.from(mail + ":" + password).toString("base64")

    const headers = new Headers({
      "Authorization": `Basic ${credentials}`,
      "Content-type": "application/x-www-form-urlencoded"
    })

    const data = new URLSearchParams({
      action: action
    })

    fetch("http://localhost:2345", {
      method: "POST",
      headers: headers,
      body: data,
      mode: "cors",
      credentials: "include"
    })
      .then(response => response.json())
      .then(dataPost => {
        console.log(dataPost)
        changeToken(dataPost.answer.email)
        console.log(token)
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
      <div>Hello {token}</div>
    </div>
  )
}
