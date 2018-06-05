class EGBSubscriber {
  /**
   * Constructor
   * @param {string} formId
   * @param {string} apiUrl
   */
  constructor(formId) {
    this.formId = formId;
    this.apiUrl = apiUrl;
  }

  /**
   * Process form to server
   */
  process(e) {
    e.preventDefault();

    // Get values
    const firstName = document.getElementById('egbcm_first_name').value;
    const lastName = document.getElementById('egbcm_last_name').value;
    const company = document.getElementById('egbcm_company_name').value;
    const email = document.getElementById('egbcm_email').value;

    // Validate
    let errors = [];

    if (firstName === '') {
      errors.push('Please provide a first name.');
    }
    if (lastName === '') {
      errors.push('Please provide a last name.');
    }
    if (email === '') {
      errors.push('Please provide an emailaddress.');
    }

    if (errors.length === 0) {
      const payload = {
        firstName,
        lastName,
        company,
        email
      };
      this.submit(payload)
        .then(() => this.reset)
        .catch(err => console.error(err));
    } else {
      errors.forEach(error => this.msg(error, 'error'));
    }
  }

  /**
   * Submti to server
   * @param {object} payload
   */
  submit(payload) {
    return new Promise((resolve, reject) => {
      fetch(this.apiUrl + '/api/v2/maillist', {
        method: 'POST',
        headers: {
          'content-type': 'application/json'
        },
        body: JSON.stringify(payload)
      })
        .then(res => res.json())
        .then(data => {
          if (data.status === 200) {
            resolve(data);
          } else {
            reject(data);
          }
        })
        .catch(err => {
          reject(err);
        });
    });
  }

  /**
   * Reset the from
   */
  reset() {
    document.getElementById('egbcm_first_name').value = '';
    document.getElementById('egbcm_last_name').value = '';
    document.getElementById('egbcm_company_name').value = '';
    document.getElementById('egbcm_email').value = '';
  }

  /**
   * Display message
   * @param {string} string
   * @param {string} type
   */
  msg(string, type) {
    const msgType = type || 'error';
  }
}
