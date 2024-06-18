export default function Page() {
    return (
      <main>
          <div className="box">
              <h1>Login</h1>
              <div>
                  <form>
                      <div>
                          <label>
                              <input type="text" name="email"/>
                          </label>
                      </div>
                      <div>
                          <label>
                              <input type="password" name="password"/>
                          </label>
                      </div>
                      <button type="button" className="submit">Login</button>
                  </form>
              </div>
          </div>
      </main>
    );
}
