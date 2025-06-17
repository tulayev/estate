export function likeHandler(baseUrl, entityId, initialIsLiked, csrfToken) {
    return {
        API_URI: `/${baseUrl}/${entityId}/like`,
        isLiked: initialIsLiked,

        async toggleLike() {
            try {
                const response = await fetch(this.API_URI, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken,
                    },
                    body: JSON.stringify({}),
                });

                if (response.status === 201) {
                    this.isLiked = true;
                } else if (response.status === 204) {
                    this.isLiked = false;
                } else {
                    console.error('Unexpected response status:', response.status);
                }
            } catch (error) {
                console.error('Like error:', error.message);
            }
        },
    };
}
