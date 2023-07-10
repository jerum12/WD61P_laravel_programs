import { Toaster } from 'react-hot-toast';
import { Navigate, Route, BrowserRouter as Router, Routes } from 'react-router-dom';
import './App.css';
import Login from './components/Login';
import Menu from './components/Menu';
function App() {
  const isAuthenticated = localStorage.getItem('login_token');
  return (
    <>
      <Router>
        <Routes>
          <Route path="/login" element={<Login />} />
          <Route
            path="/dashboard/*"
            element={isAuthenticated ? <Menu /> : <Navigate to="/login" />}
          />
          <Route
            path="/"
            element={isAuthenticated ? <Navigate to="/dashboard" /> : <Navigate to="/login" />}
          />
        </Routes>
      </Router>
      <Toaster />
    </>
  );
}

export default App;
