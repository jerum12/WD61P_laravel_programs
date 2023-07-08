import { Alert, Box, Button, CircularProgress, TextField, Typography } from '@mui/material';
import axios from 'axios';
import React, { useState } from 'react';
import { useNavigate } from 'react-router-dom';

function Login() {
  //   const [email, setEmail] = useState('');
  //   const [password, setPassword] = useState('');
  const navigate = useNavigate();

  const [formData, setFormData] = useState({
    email: '',
    password: '',
  });
  const [error, setError] = useState('');
  const [submitLoading, setSubmitLoading] = useState(false);

  const handleLogin = async (event) => {
    event.preventDefault();
    setError('');
    setSubmitLoading(true);

    if (!validateForm()) {
      setSubmitLoading(false);
      return;
    } else {
      try {
        const response = await axios.post('http://127.0.0.1:8000/api/login', formData);
        const token = response.data.token;

        localStorage.setItem('login_token', token);
        navigate('/');
      } catch (error) {
        let errorMessage = error.response.data.error;
        setError(errorMessage);
      }
      setSubmitLoading(false);
    }
  };

  const validateForm = () => {
    if (formData.email === undefined || formData.email === '') {
      setError('Email is required!');
      return false;
    } else if (formData.password === undefined || formData.password === '') {
      setError('Password is required!');
      return false;
    }

    return true;
  };

  const handleChange = (event) => {
    // console.log(event.target.name, event.target.value);

    // if (event.target.name === 'email') setEmail(event.target.value);

    // if (event.target.name === 'password') setPassword(event.target.value);

    setFormData((prevState) => ({
      ...prevState,
      [event.target.name]: event.target.value,
    }));
  };

  return (
    <Box
      sx={{
        display: 'flex',
        justifyContent: 'center',
        flexDirection: 'column',
        alignItems: 'center',
        marginTop: '20px',
        gap: '20px',
      }}
    >
      <Typography variant="h2">Login Page</Typography>

      {error && <Alert severity="error">{error}</Alert>}
      <div
        style={{ border: '1px solid black', margin: '10px', padding: '20px', borderRadius: '20px' }}
      >
        <TextField
          id="email"
          fullWidth
          label="Email"
          name="email"
          variant="standard"
          value={formData.email}
          onChange={handleChange}
        />
        <TextField
          id="password"
          fullWidth
          label="Password"
          name="password"
          variant="standard"
          type="password"
          value={formData.password}
          onChange={handleChange}
        />
        <Button
          variant="contained"
          onClick={handleLogin}
          style={{ display: 'block', width: '40%', margin: '10px auto' }}
          disabled={submitLoading}
        >
          {submitLoading ? <CircularProgress size={'10px'} /> : ''}Login
        </Button>
      </div>
    </Box>
  );
}

export default Login;
