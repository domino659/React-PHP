import { useEffect } from "react"

export default function App() {
  useEffect( () => {
    const body = new URLSearchParams({
      username: 'Francis',
      password: 'password'
    });

    const headers = new Headers({
      'Content-Type': 'application/x-www-form-urlencoded',
      'authorization': `Basic ${btoa("Francis:password")}`
    })

    fetch( 'http://localhost:2345', {
      method: 'POST',
      body: body,
      headers: headers,
      mode: 'cors',
      credentials: 'include'
    })
      .then(res => res.json())
      .then(data => console.log(data))
  },  [])

  return (
  <></>
  )
}
