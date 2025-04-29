export function login(pseudonym, router) {
    if (!pseudonym.trim()) {
      alert("Please enter a pseudonym.");
      return;
    }
    localStorage.setItem('pseudonym', pseudonym);
    router.push('/map');
  }